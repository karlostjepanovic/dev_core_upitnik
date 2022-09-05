<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SetSchoolClassController;
use App\Http\Controllers\SetSchoolController;
use App\Http\Controllers\SetStudentController;
use App\Http\Controllers\SetStudentQuestionnaireController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentQuestionnaireController;
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
         * ODABIR ŠKOLE I RAZREDA
         */
        Route::get('set-school', [SetSchoolController::class, 'index'])->name('setSchool');
        Route::post('set-school/{school}', [SetSchoolController::class, 'setSchool']);
        Route::group(["prefix" => "school/{school}"], function() {
            Route::get('set-class', [SetSchoolClassController::class, 'index'])->name('setSchoolClass');
            Route::post('set-class/{schoolClass}', [SetSchoolClassController::class, 'setClass']);

            Route::get('create', [SchoolClassController::class, 'create']);
            Route::post('create', [SchoolClassController::class, 'store']);
            /*
             * POSTAVKE ZA RAZREDNI ODJEL - dodati kasnije u sučelje za razred
             * Route::get('set-class/{schoolClass}/show', [SchoolClassController::class, 'show']);
            Route::post('set-class/{schoolClass}/update', [SchoolClassController::class, 'update']);
            Route::post('set-class/{schoolClass}/destroy', [SchoolClassController::class, 'destroy']);
            */

            Route::group(["prefix" => "school-class/{schoolClass}"], function() {
                Route::get('set-student', [SetStudentController::class, 'index'])->name('setStudent');
                Route::post('set-student/{student}', [SetStudentController::class, 'setStudent']);

                Route::post('search', [StudentController::class, 'search']);
                Route::get('create', [StudentController::class, 'create']);
                Route::post('create', [StudentController::class, 'store']);

                Route::group(["prefix" => "student/{student}"], function() {
                    Route::get('show', [StudentController::class, 'showStudent'])->name('student');
                    Route::get('add-questionnaire', [StudentQuestionnaireController::class, 'create']);
                    Route::post('add-questionnaire', [StudentQuestionnaireController::class, 'store']);

                    Route::post('set-questionnaire/{studentQuestionnaire}', [SetStudentQuestionnaireController::class, 'setStudentQuestionnaire']);
                    Route::group(["prefix" => "questionnaire/{studentQuestionnaire}"], function() {
                        Route::get('show', [StudentQuestionnaireController::class, 'showResults'])->name('showResults');
                        Route::get('get-results', [StudentQuestionnaireController::class, 'getResults'])->name('getResults');
                    });
                });
            });
        });

        /*
         * RJEŠAVANJE UPITNIKA
         */
        Route::get('questionnaires', [StudentQuestionnaireController::class, 'index'])->name('myQuestionnaires');
        Route::post('set-questionnaire/{studentQuestionnaire}', [StudentQuestionnaireController::class, 'setQuestionnaire']);
        Route::group(["prefix" => "questionnaire/{studentQuestionnaire}"], function() {
            Route::get('show', [StudentQuestionnaireController::class, 'showQuestionnaire'])->name('showQuestionnaire');
            Route::post('submit', [AnswerController::class, 'submit']);
        });
    });
});
