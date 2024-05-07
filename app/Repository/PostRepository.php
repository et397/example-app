<?php
    namespace App\Repositories;

    use app\Models\Entities\Post;

    class PostRepository
    {
        public function index()
        {
            return Post::all();
        }

        public function findOrFail(string $id)
        {
            return Post::find($id);
        }
    }
