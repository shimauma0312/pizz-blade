<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\HelloGonbe;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;

// ポータルサイトホーム
Route::get('/', action: [HomeController::class, 'index']);

// ログイン後の一般的なページルーティング
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', action:[DashboardController::class, 'index'])->name('dashboard');

    // Postのルート
    Route::get('/dashboard/posts/show/{postId}', [PostController::class, 'show'])->name('posts.show');

});
// 認証が必要なルートのグループ
Route::middleware('auth')->group(function () {
    // プロフィール編集ページを表示するルート
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // プロフィールを更新するルート
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // プロフィールを削除するルート
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('hello', action: [HelloController::class, 'index']);

Route::post('hello', action: [HelloController::class, 'index']);

Route::get('user/{id}/{name?}', function ($id, $name = 'john') {
    return 'User '.$id.' '.$name;
});

require __DIR__.'/auth.php';
