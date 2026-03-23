<?php

use App\Http\Controllers\Top10Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // For JUDGES
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // For ADMIN
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'admin'])->name('admin');
    Route::get('/production_winners', [App\Http\Controllers\AdminController::class, 'production_winners'])->name('production-winners');
    Route::get('/preliminary-ranking', [App\Http\Controllers\AdminController::class, 'preliminary_ranking'])->name('preliminary_ranking');

    // grading for the top 11 category
    //swimsuit
    Route::get('/swimsuit/form', [App\Http\Controllers\CoronationController::class, 'swimsuit_form'])->name('swimsuit_form');
    Route::post('/swimsuit/post', [App\Http\Controllers\CoronationController::class, 'post_swimsuit_form'])->name('post_swimsuit_form');
    Route::get('/swimsuit/rank', [App\Http\Controllers\CoronationController::class, 'rank_swimsuit'])->name('rank_swimsuit');

    ///gown
    Route::get('/gown/form', [App\Http\Controllers\CoronationController::class, 'gown_form'])->name('gown_form');
    Route::post('/gown/post', [App\Http\Controllers\CoronationController::class, 'post_gown_form'])->name('post_gown_form');
    Route::get('/gown/rank', [App\Http\Controllers\CoronationController::class, 'rank_gown'])->name('rank_gown');


    // top 5 selection snap talk
    //question
    Route::get('/question/form', [ Top10Controller::class, 'question_form'])->name('question_form');
    Route::post('/question/post', [Top10Controller::class, 'post_question_form'])->name('post_question_form');
    Route::get('/question/rank', [Top10Controller::class, 'rank_question'])->name('rank_question');


    ///grading for the top 5 final event

    //final Q and A
    Route::get('/final/form', [App\Http\Controllers\FinalsController::class, 'final_form'])->name('final_form');
    Route::post('/final/post', [App\Http\Controllers\FinalsController::class, 'post_final_form'])->name('post_final_form');
    Route::get('/final/rank', [App\Http\Controllers\FinalsController::class, 'rank_final'])->name('rank_final');



    // admin winner generation
    Route::get('/admin/swimsuit/rank', [App\Http\Controllers\AdminController::class, 'overall_swimsuit'])->name('overall_swimsuit');
    Route::get('/admin/gown/rank', [App\Http\Controllers\AdminController::class, 'overall_gown'])->name('overall_gown');
    Route::get('/admin/question/rank', [App\Http\Controllers\AdminController::class, 'overall_question'])->name('overall_question');
    Route::get('/admin/overall/coronation', [App\Http\Controllers\AdminController::class, 'overall_final'])->name('overall_final');

    Route::get('/admin/overall/rank', [App\Http\Controllers\AdminController::class, 'overall_winner'])->name('overall_winner');


    // postProductionGrading
    Route::get('/production', [App\Http\Controllers\HomeController::class, 'production_grading'])->name('production-grading');

    Route::post('/production/post', [App\Http\Controllers\HomeController::class, 'postProductionGrading'])->name('postProductionGrading');
    Route::get('/production/rank', [App\Http\Controllers\HomeController::class, 'postProductionRanking'])->name('postProductionRanking');
});
