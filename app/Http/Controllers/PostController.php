<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // Get auth user
        $user = Auth::user();
        // Generate unique slug
        $slug = uniqid();
        // Store post object in db
        $post = new Post([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'slug' => $slug,
            'user_id' => $user->getAuthIdentifier()
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
        /** @var Post $post */
        $post = Post::whereSlug($slug)->firstOrFail();
        $comments = $post->comments()->get();
        return view('show', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit($slug)
    {
        // Get post by unique slug
        $post = Post::whereSlug($slug)->firstOrFail();
        // Allow post edit only to post writers
        if (Auth::id() == $post->user_id) {
            return view('edit', compact('post'));
        } else {
            return redirect(action('PostController@show', $post->slug))->withErrors('You are not the original post writer!');
        }
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
        // Allow post update only to post writers
        if (Auth::id() == $post->user_id) {
            $post->save();
            return redirect(action('PostController@edit', $post->slug))->with('status', 'The post with the slug ' . $slug . ' has been updated!');
        } else {
            return redirect(action('PostController@show', $post->slug))->withErrors('You are not the original post writer!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($slug)
    {
        // Get post by unique slug
        $post = Post::whereSlug($slug)->firstOrFail();
        // Allow post deletion only to post writers
        if (Auth::id() == $post->user_id) {
            $post->delete();
            return redirect('/home')->with('status', 'The post with the slug ' . $slug . ' has been deleted!');
        } else {
            return redirect(action('PostController@show', $post->slug))->withErrors('You are not the original post writer!');
        }
    }
}
