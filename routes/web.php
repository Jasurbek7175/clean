<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', [PageController::class, 'home'])->name('main');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/service', [PageController::class, 'service'])->name('service');
Route::get('/project', [PageController::class, 'project'])->name('project');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/single', [PageController::class, 'single'])->name('single');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');


Route::get('custom', [PostController::class, 'custom']);
Route::resource('posts', PostController::class);

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
//Route::get('/show/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('posts/create', [PostController::class, 'store'])->name('posts.create');
Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('posts/{post}/edit', [PostController::class, 'update'])->name('posts.update');
Route::delete('posts/{post}/delete', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/products/create2', [ProductController::class, 'create2'])->name('qwer');

Route::resources(
    ['products' => ProductController::class,
     'comments' => CommentController::class
        ]);
