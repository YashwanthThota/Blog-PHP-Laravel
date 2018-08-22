<?php

namespace App\Http\Controllers;

use Session;
use Auth;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //display all posts
        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //this is used to check if there are list categories available to posts
      //if not available redirect to new category page
      $categories = Category::all();
      $tags =Tag::all();

      if($categories->count() == 0 || $tags->count() == 0)
      {
        Session::flash('info', 'You must have some categories and tags before attempting to create a post.');

        return redirect()->back();
      }
      //return admin/posts/create.blade.php view
      //send the categories to the post form
       return view('admin.posts.create')->with('categories', $categories)
                                        ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //by default the controller will have validation class
      //we have to inherit it from controller.php, since this controller extends controller.php
      //we are using pipes concept to validate the data
        $this->validate($request, [
          'title' => 'required',
          'featured' => 'required|image',
          'content' => 'required',
          'category_id' => 'required',
          'tags' => 'required'
        ]);

        $featured = $request->featured;

        //to keep the file name unique we append the timestamp
        $featured_new_name = time().$featured->getClientOriginalName();

        //uplaod the file to public/uplaod/posts folder
        $featured->move('uploads/posts', $featured_new_name);

        //post it to db
        //store the file path of the pics
         $post = Post::create([
         'title' => $request->title,
         'content' => $request->content,
         'featured' => 'uploads/posts/'.$featured_new_name,
         'category_id' => $request->category_id,
          'slug' => str_slug($request->title),
          'user_id' => Auth::id()
         ]);

         //the below step clubs two tables tags and posts check model for there relationship
         $post->tags()->attach($request->tags);

        Session::flash('success', 'Post created successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('admin.posts.edit')->with('post', $post)
                                       ->with('categories', Category::all())
                                       ->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //the user may stick to old image so that is why we are not validating the image
        $this->validate($request, [
        'title' => 'required',
        'content' => 'required',
        'category_id' => 'required'
        ]);

        $post = Post::find($id);
        //if a new image is uploaded then use that image
        if($request->hasFile('featured')){
          $featured = $request->featured;

          $featured_new_name = time().$featured->getClientOriginalName();

          $featured->move('uploads/posts', $featured_new_name);

          $post->featured = 'uploads/posts/'.$featured_new_name;
        }

        $post->title = $request->title;

        $post->content = $request->content;

        $post->category_id = $request->category_id;

        $post->save();

        $post->tags()->sync($request->tags);


        Session::flash('success', 'Post updated successfully.');

        return redirect()->route('posts');





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'The post was just trashed.');

        return redirect()->back();
    }

    public function trashed() {
      //onlyTrashed is a query and get will get the at of that query
      $posts = Post::onlyTrashed()->get();

      return view('admin.posts.trashed')->with('posts', $posts);
    }

    public function kill($id) {
      //onlyTrashed is a query
      $post = Post::withTrashed()->where('id',$id)->first();

      $post->forceDelete();

      Session::flash('success', 'Post deleted permanently.');

      return redirect()->back();
    }

    public function restore($id) {
      //onlyTrashed is a query
      $post = Post::withTrashed()->where('id',$id)->first();

      $post->restore();

      Session::flash('success', 'Post restored successfully.');

      return redirect()->route('posts');
    }
}
