<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\EloquentPostRepository;


class PostController extends Controller {

    private PostRepositoryInterface $repository;

    public function __construct() {
        $this->repository = new EloquentPostRepository();
    }
    
    public function index() {
        $posts = $this->repository->getAll();
        return view('posts.index', ['posts' => $posts]);
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|min:3',
            'body' => 'required|min:10'
        ]);

        $this->repository->create([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect('/posts');
    }

    public function show(int $id) {
        $post = $this->repository->findById($id);
        return view('posts.show', ['post' => $post]);
    }

    public function edit(int $id) {
        $post = $this->repository->findById($id);
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, int $id) {
        $post = $this->repository->findById($id);

        $request->validate([
            'title' => 'required|min:3',
            'body' => 'required|min:10' 
        ]);

        $this->repository->update($id, [
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect("/posts/{$post->id}");
    }

    public function destroy(int $id) {
        $this->repository->delete($id);
        return redirect('/posts');  
    }
}
