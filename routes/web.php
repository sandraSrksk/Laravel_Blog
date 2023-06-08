<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

// Display all blog posts
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');

// Show the form for creating a new blog post
Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');

// Store a newly created blog post in the database
Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');

// Show a specific blog post
Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show');

// Show the form for editing a blog post
Route::get('/blog/{post}/edit', [BlogController::class, 'edit'])->name('blog.edit');

// Update the specified blog post in the database
Route::put('/blog/{post}', [BlogController::class, 'update'])->name('blog.update');

// Delete the specified blog post from the database
Route::delete('/blog/{post}', [BlogController::class, 'destroy'])->name('blog.destroy');
