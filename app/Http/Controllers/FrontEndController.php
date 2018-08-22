<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\Category;
use App\Setting;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
  public function index()
  {

    return view('index')
              ->with('title', Setting::first()->site_name)
              //take5 will take first 5 posts
              ->with('categories', Category::take(5)->get())
              //this will take the first post in a list of posts
              ->with('first_post', Post::orderBy('created_at', 'desc')->first())
              //this will skip the first post and take the next one 'get()' the collection of posts and first() will get the post
              ->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
              //this will skip the first two post and take the next one 'get()' the collection of posts and first() will get the post
              ->with('third_post', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
              //displaying 2 categories with 3 Posts
              ->with('laravel', Category::find(21))
              ->with('career', Category::find(51))
              //this is for the Footer
              ->with('settings', Setting::first());

  }

  public function singlePost($slug)
  {
    $post = Post::where('slug', $slug)->first();

//this is used for next and previous pagenation
    $next_id =Post::where('id','>',$post->id)->min('id');
    $prev_id =Post::where('id','<',$post->id)->max('id');

    return view('single')->with('post', $post)
                              ->with('title', $post->title)
                              ->with('settings', Setting::first())
                              ->with('categories', Category::take(5)->get())
                              ->with('next',Post::find($next_id))
                              ->with('prev',Post::find($prev_id))
                              ->with('tags', Tag::all());
  }


  public function category($id)
  {
    $category = Category::find($id);

    return view('category')->with('category', $category)
                            ->with('title', $category->name)
                            ->with('settings', Setting::first())
                            ->with('categories', Category::take(5)->get());

  }

  public function tag($id)
  {
    $tag = Tag::find($id);

    return view('tag')->with('tag', $tag)
                      ->with('title', $tag->tag)
                      ->with('settings', Setting::first())
                      ->with('categories', Category::take(5)->get());
  }

}
