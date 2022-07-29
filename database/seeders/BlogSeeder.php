<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::create([
            'name' => 'Photography',
            'slug' => 'Photography',
        ]);

        $category2 = Category::create([
            'name' => 'Health',
            'slug' => 'Health',
        ]);

        $category3 = Category::create([
            'name' => 'Visas',
            'slug' => 'Visas',
        ]);

        $category4 = Category::create([
            'name' => 'Friends',
            'slug' => 'Friends',
        ]);

        $category5 = Category::create([
            'name' => 'Food',
            'slug' => 'Food',
        ]);
        // //////
        $tag1 = Tag::create([
            'name' => 'Travel',
            'slug' => 'Travel'
        ]);

        $tag2 = Tag::create([
            'name' => 'Cruise',
            'slug' => 'Cruise'
        ]);

        $tag3 = Tag::create([
            'name' => 'Beach',
            'slug' => 'Beach'
        ]);

        $tag4 = Tag::create([
            'name' => 'Adventure',
            'slug' => 'Adventure'
        ]);

        $tag5 = Tag::create([
            'name' => 'Sunset',
            'slug' => 'Sunset'
        ]);

        $tag6 = Tag::create([
            'name' => 'Travelphotography',
            'slug' => 'Travelphotography'
        ]);

        $tag7 = Tag::create([
            'name' => 'Nature',
            'slug' => 'Nature'
        ]);

        $tag8 = Tag::create([
            'name' => 'Wanderlust',
            'slug' => 'Wanderlust'
        ]);
        // //////////

        $blog1 = Blog::create([
            'title' => 'Camera Backpacks',
            'slug' => Str::slug('Camera Backpacks', '-'),
            'description' => 'What to look for',
            'content' => ' In the best camera backpacks, you can count on having a separate pocket to keep a laptop and some extra space to store other camera accessories like lenses, SD cards, cables, external hard drives, and so on. And of course, some personal essentials like documents, passport, your phone, and so on.',
            'category_id' => $category1->id,
            'published_at' => Date::now()
        ]);
        $blog1->media()->create([
            'file_path' => 'blogs/blog.jpg',
            'file_name' => 'blog.jpg',
            'file_size' => '500',
            'file_type' => 'image/jpg',
            'file_status' => true,
            'file_sort' => 0,
            'published' => true,
        ]);


        $blog2 = Blog::create([
            'title' => 'Avoid Getting Sick',
            'slug' => Str::slug('Avoid Getting Sick', '-'),
            'description' => 'Tips to reduce chances of sickness',
            'content' => ' As basic as this sounds, this is an essential component of preventing sickness. I’m sure you’ve seen countless PSA all over the world about washing your hands during Covid-19, and that is because washing your hands with water and soap for 20 seconds does help reduce the spread of germs that cause respiratory and diarrheal infections.',
            'category_id' => $category2->id,
            'published_at' => Date::now()
        ]);
        $blog2->media()->create([
            'file_path' => 'blogs/blog.jpg',
            'file_name' => 'blog.jpg',
            'file_size' => '500',
            'file_type' => 'image/jpg',
            'file_status' => true,
            'file_sort' => 0,
            'published' => true,
        ]);

        $blog3 = Blog::create([
            'title' => 'Travel with friends',
            'slug' => Str::slug('Travel with friends', '-'),
            'description' => 'It’s also nice to travel with friends',
            'content' => ' You’ll be able to work together to plan the trip, look out for each other on nights out, and create fantastic memories together. What’s important when planning a group trip with friends is to think about everyone in the group to make sure no one is left out or unhappy and to compromise where necessary.',
            'category_id' => $category4->id,
        ]);
        $blog3->media()->create([
            'file_path' => 'blogs/blog.jpg',
            'file_name' => 'blog.jpg',
            'file_size' => '500',
            'file_type' => 'image/jpg',
            'file_status' => true,
            'file_sort' => 0,
            'published' => true,
        ]);
        $blog4 = Blog::create([
            'title' => 'Try Local Food',
            'slug' => Str::slug('Try Local Food', '-'),
            'description' => 'The local cuisine can be a big part of a destination and around the world you’ll find more variety than you could ever imagine',
            'content' => ' To make the most of your trip and a top tip is to try local dishes and delicacies, especially if it’s something you’ll be unlikely to get back home. To find local food you could do some research in advance on what you should try, or explore and try your luck, or even go on a dedicated food tour. ',
            'category_id' => $category5->id,
        ]);
        $blog4->media()->create([
            'file_path' => 'blogs/blog.jpg',
            'file_name' => 'blog.jpg',
            'file_size' => '500',
            'file_type' => 'image/jpg',
            'file_status' => true,
            'file_sort' => 0,
            'published' => true,
        ]);
        $blog5 = Blog::create([
            'title' => 'Carry Hand Sanitizer',
            'slug' => Str::slug('Carry Hand Sanitizer', '-'),
            'description' => 'Tips to reduce chances of sickness',
            'content' => ' Some destinations, even those that are well developed for tourists can have questionable cleanliness. This might be because they are so busy that they naturally get dirty very quickly. So, whenever you travel then keep yourself a little bottle of sanitiser in your bag and use it before eating, or other times where necessary. This is even more important now after the Coronavirus pandemic.',
            'category_id' => $category2->id,
        ]);
        $blog5->media()->create([
            'file_path' => 'blogs/blog.jpg',
            'file_name' => 'blog.jpg',
            'file_size' => '500',
            'file_type' => 'image/jpg',
            'file_status' => true,
            'file_sort' => 0,
            'published' => true,
        ]);
        $blog6 = Blog::create([
            'title' => 'Make copies of your passport',
            'slug' => Str::slug('Make copies of your passport', '-'),
            'description' => 'Instances where you lose your passport',
            'content' => ' In the event that you lose your passport, you’d have to go to an embassy and get a replacement or temporary passport. To help prove who you are and to make the process easier then make copies of your passport. You could also consider saving this in a secure place online so that you can access it easily if you ever need to.',
            'category_id' => $category3->id,
        ]);
        $blog6->media()->create([
            'file_path' => 'blogs/blog.jpg',
            'file_name' => 'blog.jpg',
            'file_size' => '500',
            'file_type' => 'image/jpg',
            'file_status' => true,
            'file_sort' => 0,
            'published' => true,
        ]);

        $blog1->tags()->attach([$tag1->id, $tag2->id]);
        $blog2->tags()->attach([$tag4->id, $tag3->id]);
        $blog3->tags()->attach([$tag1->id, $tag4->id]);
        $blog1->tags()->attach([$tag3->id, $tag2->id]);

        $blog1->tags()->attach([$tag8->id, $tag1->id]);
        $blog5->tags()->attach([$tag7->id, $tag3->id]);
        $blog6->tags()->attach([$tag6->id, $tag8->id]);
        $blog2->tags()->attach([$tag5->id, $tag6->id]);
        $blog4->tags()->attach([$tag4->id, $tag8->id]);
        $blog5->tags()->attach([$tag7->id, $tag4->id]);
    }
}
