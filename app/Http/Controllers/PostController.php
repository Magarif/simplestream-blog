<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // Pass all posts to index view
        $posts = Post::all();
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        // Return form for posts creation
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PostCreateRequest $request)
    {
        // Generate unique slug
        $slug = uniqid();
        // Store post object in db
        $post = new Post([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'slug' => $slug
        ]);
        $post->save();
        // Redirect
        return redirect('/create')->with('status', 'The post with the slug ' . $slug . 'has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        // Get post by unique slug
        $post = Post::whereSlug($slug)->firstOrFail();
        return view('show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($slug)
    {
        // Get post by unique slug
        $post = Post::whereSlug($slug)->firstOrFail();
        return view('edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PostCreateRequest  $request
     * @param  string  $slug
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(PostCreateRequest $request, $slug)
    {
        // Get post by unique slug
        $post = Post::whereSlug($slug)->firstOrFail();
        // Define properties from request data
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        // Store new values and redirect
        $post->save();
        return redirect(action('PostController@edit', $post->slug))->with('status', 'The post with the slug ' . $slug . ' has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
