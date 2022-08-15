<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [AuthController::class, "index"])->name("login");
Route::post('/login', [AuthController::class, "login"]);
Route::get('/logout', [AuthController::class, "logout"])->name("logout");

Route::group(['middleware' => 'auth'], function () {
    Route::get('change-password', [PasswordController::class, 'index'])->name("profile.changePassword");
    Route::post('update-password', [PasswordController::class, 'update']);

    Route::group(['middleware' => ['password.changed']], function () {
        /*
         * ADMINISTRACIJA SUSTAVA
         */
        Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
            // ŠKOLE
            Route::group(["prefix" => "schools"], function() {
                Route::get('/', [SchoolController::class, 'index'])->name('admin.schools');
                Route::get('create', [SchoolController::class, 'create']);
                Route::post('create', [SchoolController::class, 'store']);
                Route::get('{school}/show', [SchoolController::class, 'show']);
                Route::post('{school}/update', [SchoolController::class, 'update']);
                Route::post('{school}/destroy', [SchoolController::class, 'destroy']);
            });

            // UPITNICI
            Route::group(["prefix" => "questionnaires"], function() {
                Route::get('/', [QuestionnaireController::class, 'index'])->name('admin.questionnaires');
                Route::get('create', [QuestionnaireController::class, 'create']);
                Route::post('create', [QuestionnaireController::class, 'store']);
                Route::get('{questionnaire}/show', [QuestionnaireController::class, 'show']);
                Route::post('{questionnaire}/update', [QuestionnaireController::class, 'update']);
                Route::post('{questionnaire}/lock', [QuestionnaireController::class, 'lock']);
                Route::post('{questionnaire}/destroy', [QuestionnaireController::class, 'destroy']);

                // ČESTICE
                Route::group(["prefix" => "{questionnaire}/items"], function() {
                    Route::get('/', [ItemController::class, 'index'])->name('admin.questionnaires.items');
                    Route::get('create', [ItemController::class, 'create']);
                    Route::post('create', [ItemController::class, 'store']);
                    Route::get('{item}/show', [ItemController::class, 'show']);
                    Route::post('{item}/update', [ItemController::class, 'update']);
                    Route::post('{item}/destroy', [ItemController::class, 'destroy']);
                });
            });

            // KORISNICI
            Route::group(["prefix" => "users"], function() {
                Route::get('/', [UsersController::class, 'index'])->name('admin.users');
                Route::get('create', [UsersController::class, 'create']);
                Route::post('create', [UsersController::class, 'store']);
                Route::get('{user}/show', [UsersController::class, 'show']);
                Route::post('{user}/update', [UsersController::class, 'update']);
                Route::post('{user}/reset-password', [UsersController::class, 'resetPassword']);
                Route::post('{user}/destroy', [UsersController::class, 'destroy']);
            });
        });

        /*
         * DJELATNICI ŠKOLE
         */
        Route::group(["prefix" => "main"], function() {
            Route::get('set-school', function () {
                return Inertia::render('Main/SetSchool');
            })->name('setSchool');
        });
    });
});
