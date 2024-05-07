<?php

namespace App\Http\Controllers;

use app\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{

    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = $this->postRepository->index();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $post = $this->postRepository->store($request->only('title', 'content'));

        if ($post) {
            return redirect()->route('posts.show', $post->id);
        }

        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = $this->postRepository->findOrFail($id);

        if (! $post) {
            return redirect()->route('posts.index');
        }

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = $this->postRepository->findOrFail($id);

        if (! $post) {
            return redirect()->route('posts.index');
        }

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $result = $this->postRepository->update($id, $request->only('title', 'content'));

        if (!$result) {
            return redirect()->route('posts.index');
        }

        return redirect()->route('posts.show', $id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $result = $this->postRepository->destroy($id);

        if ($result) {
            return redirect()->route('posts.index');
        }

        return back();
    }


}
