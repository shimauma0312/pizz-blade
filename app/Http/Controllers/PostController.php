<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Log as Logger;

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

    /**
     * 新規作成フォームを表示
     */
    public function createForm()
    {
        return view('posts.create');
    }

    /**
     * 新規作成処理
     */
    public function store(Request $request)
    {   
        // バリデーション
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'eyecatch' => 'required',
        ]);

        try {
            // データの保存
            $post = new Post();
            $post->user_id = $request->user()->id;
            $post->title = $request->title;
            $post->body = $request->body;
            $post->save();
            Logger::debug("inserted post data: " . $post);
        } catch (Exception $e) {
            Logger::debug($e->getMessage());
            return back()->withInput();
        }
        
        return redirect()->route('dashboard');
    }
}
