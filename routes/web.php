<?php

use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\UserPdfController;
use Illuminate\Support\Facades\Route;



Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/category/{id}', [DashboardController::class, 'cat_view'])->name('category.view');

Route::get('/product/{id}', [DashboardController::class, 'pro_view'])->name('product.view');

Route::post('/pdf-store', [UserPdfController::class, 'store'])->name('pdf.store');

Route::get('/thank_you/{id}', [UserPdfController::class, 'thank_you'])->name('thank.you');

Route::get('/user-pdf-generate/{id}', [UserPdfController::class, 'pdf_generate'])->name('userpdf.generate');


Route::get('/customer', [DashboardController::class, 'customer'])->name('customer');
