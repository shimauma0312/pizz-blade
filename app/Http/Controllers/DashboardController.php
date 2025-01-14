<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index() {
        // 記事を取得
        $posts = Post::latestTenPosts();

        return view('dashboard', ['posts' => $posts]);
    }
}
