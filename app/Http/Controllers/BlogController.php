<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Blo\CreateBlogRequest;
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

    public function store(CreateBlogRequest $request)
    {
        //upload image
        $image = $request->image->store('blogs');
        //create post
        $destination = Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $image,
            'published_at' => $request->published_at,
            'category_id' => $request->category
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
            ->with('recent', Blog::whereNotNull('published_at')->orderBy('published_at','DESC')->take(3)->get())
            ->with('categories', Category::withCount('blogs')->has('blogs', '>' , 0)->take(5)->get())
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
        return view('blog.create')->with('blogs', $blog)->with('categories', Category::all());
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
    }

    /**
     * Display a list of unavailable destinations.
     * @return \Illuminate\Http\Response
     */

    public function trashed()
    {
    }

    public function restore($id)
    {
    }
}
