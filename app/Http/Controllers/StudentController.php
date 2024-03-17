<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function login()
    {
        return view('student/login');
    }

    public function logincheck(Request $request)
    {
        $username = $request->query('username');
        $password = $request->query('password');

        return view('student/logincheck')->with(['username' => $username, 'password' => $password]);
    }

    public function mainmenu()
    {
        return view('student/mainmenu');
    }

    public function academiccalendar()
    {
        return view('student/obs/academiccalendar');
    }

    public function syllabus()
    {
        return view('student/obs/syllabus');
    }

    public function examcalendar()
    {
        return view('student/obs/examcalendar');
    }

    public function notelist()
    {
        return view('student/obs/notelist');
    }

    public function attendancelist()
    {
        return view('student/obs/attendancelist');
    }

    public function changepassword()
    {
        return view('student/obs/changepassword');
    }

    public function updatechangepassword()
    {
        return view('student/obs/updatechangepassword');
    }

    public function info()
    {
        return view('student/obs/info');
    }

    public function updateinfo()
    {
        return view('student/obs/updateinfo');
    }

    public function sentmessage()
    {
        return view('student/obs/sentmessage');
    }

    public function incomingmessage()
    {
        return view('student/obs/incomingmessage');
    }

    public function addmessage()
    {
        return view('student/obs/addmessage');
    }

    public function dbaddmessage()
    {
        return view('student/obs/dbaddmessage');
    }

    ///ATTENDANCE

    public function lessonlist()
    {
        return view('student/attendance/lessonlist');
    }

    public function lessonweeks()
    {
        return view('student/attendance/lessonweeks');
    }

    public function joinlesson()
    {
        return view('student/attendance/joinlesson');
    }

    public function dbattendance()
    {
        return view('student/attendance/dbattendance');
    }


    ///EXAM

    public function examlist()
    {
        return view('student/exam/examlist');
    }

    public function examloading()
    {
        return view('student/exam/examloading');
    }

    public function questionlist()
    {
        return view('student/exam/questionlist');
    }

    public function examout()
    {
        return view('student/exam/examout');
    }

    public function examanswerrecord()
    {
        return view('student/exam/examanswerrecord');
    }


}
