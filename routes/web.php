<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BelajarmandiriController;
use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\VideoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/add', function () {
    return view('add');
})->name('berita.add');

Route::get('/detail', function () {
    return view('berita.detail');
});

Route::get('/add', [BeritaController::class, 'add'])->name('berita.add');
Route::post('/add_process', [BeritaController::class, 'add_process'])->name('berita.add_process');
Route::get('/beritamidi', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/detail/{id}', [BeritaController::class, 'detail'])->name('berita.detail');
Route::get('/adminshow', [BeritaController::class, 'show_by_admin'])->name('berita.show_by_admin');
Route::get('/edit/{id}', [BeritaController::class, 'edit'])->name('berita.edit');
Route::post('/edit_process', [BeritaController::class, 'edit_process'])->name('berita.edit_process');
Route::get('/delete/{id}', [BeritaController::class, 'delete'])->name('berita.delete');

Route::get('/addmandiri', [BelajarmandiriController::class, 'addmandiri'])->name('belajarmandiri.addmandiri');
Route::post('/addmandiri_process', [BelajarmandiriController::class, 'addmandiri_process'])->name('belajarmandiri.addmandiri_process');
Route::get('/belajarmandiri', [BelajarmandiriController::class, 'showmandiri'])->name('belajarmandiri.show');
Route::get('/detailmandiri/{id}', [BelajarmandiriController::class, 'detailmandiri'])->name('belajarmandiri.detailmandiri');
Route::get('/adminmandirishow', [BelajarmandiriController::class, 'show_by_adminmandirishow'])->name('belajarmandiri.show_by_adminmandirishow');
Route::get('/editmandiri/{id}', [BelajarmandiriController::class, 'editmandiri'])->name('belajarmandiri.editmandiri');
Route::post('/editmandiri_process', [BelajarmandiriController::class, 'editmandiri_process'])->name('belajarmandiri.editmandiri_process');
Route::get('/deletemandiri/{id}', [BelajarmandiriController::class, 'deletemandiri'])->name('belajarmandiri.deletemandiri');

Route::get('/addkm', [KnowledgeController::class, 'addkm'])->name('knowledge.addmandiri');
Route::post('/addkm_process', [KnowledgeController::class, 'addkm_process'])->name('knowledge.addkm_process');
Route::get('/repositorykm', [KnowledgeController::class, 'showkm'])->name('knowledge.showkm');
Route::get('/detailkm/{id}', [KnowledgeController::class, 'detailkm'])->name('knowledge.detailkm');
Route::get('/showkm', [KnowledgeController::class, 'show_by_adminkmshow'])->name('knowledge.show_by_adminkmshow');
Route::get('/editkm/{id}', [KnowledgeController::class, 'editkm'])->name('knowledge.editkm');
Route::post('/editkm_process', [KnowledgeController::class, 'editkm_process'])->name('knowledge.editkm_process');
Route::get('/deletekm/{id}', [KnowledgeController::class, 'deletekm'])->name('knowledge.deletekm');
// Route::get('/repositoryall', [KnowledgeController::class, 'showkm'])->name('knowledge.showkm');

Route::get('/addvidmod', [VideoController::class, 'addvidmod'])->name('video.addvidmod');
Route::post('/addvidmod_process', [VideoController::class, 'addvidmod_process'])->name('video.addvidmod_process');
Route::get('/modkm', [VideoController::class, 'showvideomod'])->name('video.showvideomod');
Route::get('/detailkm/{id}', [VideoController::class, 'detailkm'])->name('video.detailkm');
Route::get('/showvideomod', [VideoController::class, 'show_by_adminvidshow'])->name('video.show_by_adminvidshow');
Route::get('/editvidmod/{id}', [VideoController::class, 'editvidmod'])->name('video.editvidmod');
Route::post('/editvid_process', [VideoController::class, 'editvid_process'])->name('video.editvid_process');
Route::get('/deletevidmod/{id}', [VideoController::class, 'deletevidmod'])->name('video.deletevidmod');

Route::get('/repositoryall', function () {
    return view('repositoryall');
});

Route::get('/materi', function () {
    return view('materi');
});