<?php

use App\Http\Controllers\AcademicianController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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

Route::get('/', [LoginController::class, 'login']);
Route::get('/login', [LoginController::class, 'login']);

///STUDENT
Route::get('/student/login', [StudentController::class, 'login']);
Route::get('/student/logincheck', [StudentController::class, 'logincheck']);
Route::get('/student/mainmenu', [StudentController::class, 'mainmenu']);
    ///OBS
    Route::get('/student/obs/academiccalendar', [StudentController::class, 'academiccalendar']);
    Route::get('/student/obs/syllabus', [StudentController::class, 'syllabus']);
    Route::get('/student/obs/examcalendar', [StudentController::class, 'examcalendar']);
    Route::get('/student/obs/notelist', [StudentController::class, 'notelist']);
    Route::get('/student/obs/attendancelist', [StudentController::class, 'attendancelist']);
    Route::get('/student/obs/changepassword', [StudentController::class, 'changepassword']);
    Route::get('/student/obs/updatechangepassword', [StudentController::class, 'updatechangepassword']);
    Route::get('/student/obs/info', [StudentController::class, 'info']);
    Route::get('/student/obs/updateinfo', [StudentController::class, 'updateinfo']);
    Route::get('/student/obs/sentmessage', [StudentController::class, 'sentmessage']);
    Route::get('/student/obs/incomingmessage', [StudentController::class, 'incomingmessage']);
    Route::get('/student/obs/addmessage', [StudentController::class, 'addmessage']);
    Route::get('/student/obs/dbaddmessage', [StudentController::class, 'dbaddmessage']);
    ///ATTENDANCE
    Route::get('/student/attendance/lessonlist', [StudentController::class, 'lessonlist']);
    Route::get('/student/attendance/lessonweeks', [StudentController::class, 'lessonweeks']);
    Route::get('/student/attendance/joinlesson', [StudentController::class, 'joinlesson']);
    Route::get('/student/attendance/dbattendance', [StudentController::class, 'dbattendance']);
    ///EXAM
    Route::get('/student/exam/examlist', [StudentController::class, 'examlist']);
    Route::get('/student/exam/examloading', [StudentController::class, 'examloading']);
    Route::get('/student/exam/questionlist', [StudentController::class, 'questionlist']);
    Route::get('/student/exam/examout', [StudentController::class, 'examout']);
    Route::get('/student/exam/examanswerrecord', [StudentController::class, 'examanswerrecord']);



///ACADEMİCİAN
Route::get('/academician/login', [AcademicianController::class, 'login']);
Route::get('/academician/logincheck', [AcademicianController::class, 'logincheck']);
Route::get('/academician/mainmenu', [AcademicianController::class, 'mainmenu']);
    ///OBS
    Route::get('/academician/obs/academiccalendar', [AcademicianController::class, 'academiccalendar']);
    Route::get('/academician/obs/syllabus', [AcademicianController::class, 'syllabus']);
    Route::get('/academician/obs/examcalendar', [AcademicianController::class, 'examcalendar']);
    Route::get('/academician/obs/notelist', [AcademicianController::class, 'notelist']);
    Route::get('/academician/obs/studentnotelist', [AcademicianController::class, 'studentnotelist']);
    Route::get('/academician/obs/updatenote', [AcademicianController::class, 'updatenote']);

