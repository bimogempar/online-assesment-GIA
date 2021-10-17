<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use GuzzleHttp\Middleware;
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
    return redirect('/login');
});

Route::group(['middleware' => ['auth', 'cekLevel:admin']], function () {
    Route::get('/admin/dashboard', DashboardController::class);

    // quiz
    Route::get('/quiz/{id}', [QuizController::class, 'showQuizById'])->name('showQuiz');
    Route::post('/quiz/create', [QuizController::class, 'createQuiz'])->name('storeQuiz');

    // question
    Route::post('/question/{quizid}/create', [QuestionController::class, 'createQuestion'])->name('storeQuestion');
});

Route::group(['middleware' => ['auth', 'cekLevel:admin,user']], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboardUser']);
    Route::post('/logout', LogoutController::class)->name('logout');
});

// auth for guest
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'loginPage'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});
