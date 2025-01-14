<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
    * リソースの一覧を表示
    */
    public function show($postId)
    {

        // TODO: modelを使ってデータを取得する
        $postData = Post::find($postId);

        return view('posts.show', compact('postData'));
    }
}
