<?php

namespace App\Repositories;

use App\Models\Post;    
use App\Repositories\PostRepositoryInterface;

class EloquentPostRepository implements PostRepositoryInterface {

    use HasTimestampsTrait;

    public function getAll(): mixed {
        return Post::all();
    }

    public function findById(int $id): mixed {
        return Post::findOrFail($id);
    }

    public function create(array $data): mixed {
        return Post::create($data);
    }

    public function update(int $id, array $data): mixed {
        $post = Post::findOrFail($id);
        $post->update($data);
        return $post;
    }

    public function delete(int $id): void {
        $post = Post::findOrFail($id);
        $post->delete();
    }
}