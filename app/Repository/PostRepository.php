<?php
    namespace App\Repositories;

    use app\Models\Entities\Post;

    class PostRepository
    {
        public function index()
        {
            //利用 Post 取出文章，並將結果 return 給 controller
            return Post::all();
        }

        public function findOrFail(string $id)
        {
            //用主鍵找資料
            return Post::find($id);
        }

        public function delete($id){
            //用主鍵刪除資料
            return Post::destroy($id);
        }

        public function store(array $data)
        {
            //新增資料
            return Post::create($data);
        }
    }
