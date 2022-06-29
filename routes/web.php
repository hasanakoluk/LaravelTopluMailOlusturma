<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/index',[\App\Http\Controllers\YonetimController::class,'index'])->name('index');

Route::get('/musteri-ekle',[\App\Http\Controllers\YonetimController::class,'musteriEkle'])->name('musteri-ekle');
Route::post('musteri-ekle-post',[\App\Http\Controllers\YonetimController::class,'MusteriEklePost'])->name('musteri-ekle-post');
Route::get('/musteri-liste',[\App\Http\Controllers\YonetimController::class,'musteriListe'])->name('musteri-liste');
Route::get('/musteri-duzenle/{id}',[\App\Http\Controllers\YonetimController::class,'musteriDuzenle'])->name('musteri-duzenle');
Route::post('musteri-duzenle-post/{id}',[\App\Http\Controllers\YonetimController::class,'musteriDuzenlePost'])->name('musteri-duzenle-post');
Route::get('/musteri-sil/{id}',[\App\Http\Controllers\YonetimController::class,'musteriSil'])->name('musteri-sil');
Route::get('/toplu-mail-olusturma',[\App\Http\Controllers\MailController::class,'index'])->name('toplu-mail-olusturma');
Route::post('mail-olustur-post',[\App\Http\Controllers\MailController::class,'MailOlusturPost'])->name('mail-olustur-post');
Route::get('/toplu-mail-gonder',[\App\Http\Controllers\MailController::class,'index2'])->name('toplu-mail-gonder');
Route::post('mail-gonder-post',[\App\Http\Controllers\MailController::class,'MailGonderPost'])->name('mail-gonder-post');
