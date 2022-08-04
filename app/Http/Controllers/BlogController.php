<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Requests\Blo\CreateBlogRequest;
use App\Http\Requests\Blog\CreateBlogRequest as BlogCreateBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('verifyCategoriesCount')->only(['create', 'store']);
    }

    public function index()
    {
        return view('blog.index')->with('blog', Blog::all());
    }

    public function create()
    {
        return view('blog.create')->with('categories', Category::all());
    }

    public function store(BlogCreateBlogRequest $request)
    {
        //upload image
        $image = $request->image->store('blogs', 'public');
        //create post
        $blog = Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $request->image,
            'slug' =>   Str::slug($request->title),
            'published_at' => $request->published_at,
            'category_id' => $request->category
        ]);

        $blog->media()->create([
            'file_path' => '/storage/' . $image,
            'file_name' => $request->file('image')->getClientOriginalName(),
            'file_size' => '500',
            'file_type' => 'image/jpg',
            'file_status' => true,
            'file_sort' => 0,
            'published' => true,
        ]);

        //flash message 
        session()->flash('success', 'Blog Created Successfully');

        //redirect
        return redirect(route('blog.index'));
    }

    public function show($slug)
    {

        return view('blogDetail')
            ->with('blog', Blog::where('slug', $slug)->first())
            ->with('recent', Blog::whereNotNull('published_at')->orderBy('published_at', 'DESC')->take(3)->get())
            ->with('categories', Category::withCount('blogs')->has('blogs', '>', 0)->take(5)->get())
            ->with('tagcloud', Tag::withCount('blogs')->orderBy('blogs_count', 'desc')->take(8)->get())
            ->with('tags', Tag::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blog.create')->with('blog', $blog)->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $data = $request->only(['title', 'description', 'published_at', 'content']);
        //check if new image
        if ($request->hasFile('Image')) {

            //upload and delete
            $image = $request->image->store('Blogs');


            $blog->deleteImage();

            $data['image'] = $image;
        }



        //update attributes
        $blog->update($data);

        //redirect user
        session()->flash('success', 'Blog updated successfully');

        return redirect(route('blog.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destinations = Blog::withTrashed()->where('id', $id)->firstOrFail();


        if ($destinations->trashed()) {
            $destinations->media->delete();

            $destinations->forceDelete();
        } else {
            $destinations->delete();
        }

        session()->flash('success', 'blog deleted successfully');

        return redirect(route('blog.index'));
    }

    /**
     * Display a list of unavailable destinations.
     * @return \Illuminate\Http\Response
     */

    public function trashed()
    {
        $trashed = Blog::onlyTrashed()->get();

        return view('blog.index')->withblogs($trashed);
    }

    public function restore($id)
    {
        $destinations = Blog::withTrashed()->where('id', $id)->firstOrFail();
        $destinations->restore();

        session()->flash('success', 'Tour restored successfully.');

        return redirect()->back();
    }
}
