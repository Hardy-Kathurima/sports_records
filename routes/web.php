<?php

use App\Http\Livewire\Users\Register;
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

Route::view('/', 'welcome')->name('home');

Route::get('admin/generate-certificate', function () {
    $data = [];
    $pdf = Pdf::loadView('pdfs.player-certificate', $data)->setPaper('a4', 'landscape');
    return $pdf->stream('certificate.pdf');

})->middleware('auth')->name('generate-certificate');




Route::get('admin/generate-player-id', function () {
    $data = [];
    $pdf = Pdf::loadView('pdfs.sports-id', $data)->setPaper('a4', 'landscape');
    return $pdf->stream('sports-id.pdf');

})->middleware('auth')->name('generate-player-id');

Route::get('admin/generate-referee-id', function () {
    $data = [];
    $pdf = Pdf::loadView('pdfs.referee', $data)->setPaper('a4', 'landscape');
    return $pdf->stream('referee-id.pdf');

})->middleware('auth')->name('generate-referee-id');

Route::get('admin/generate-team-official-id', function () {
    $data = [];
    $pdf = Pdf::loadView('pdfs.team-official', $data)->setPaper('a4', 'landscape');
    return $pdf->stream('team-official-id.pdf');

})->middleware('auth')->name('generate-team-official-id');

Route::get('admin/generate-tournament-official-id', function () {
    $data = [];
    $pdf = Pdf::loadView('pdfs.tournament-official', $data)->setPaper('a4', 'landscape');
    return $pdf->stream('tournament-official-id.pdf');

})->middleware('auth')->name('generate-tournament-official-id');

Route::get('user-registration',Register::class)->name('registerUser');
