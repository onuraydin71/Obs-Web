<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcademicianController extends Controller
{
    public function login()
    {
        return view('academician/login');
    }

    public function logincheck(Request $request)
    {
        $username = $request->query('username');
        $password = $request->query('password');

        return view('academician/logincheck')->with(['username' => $username, 'password' => $password]);
    }

    public function mainmenu()
    {
        return view('academician/mainmenu');
    }

    ///OBS

    public function academiccalendar()
    {
        return view('academician/obs/academiccalendar');
    }

    public function syllabus()
    {
        return view('academician/obs/syllabus');
    }

    public function examcalendar()
    {
        return view('academician/obs/examcalendar');
    }

    public function notelist()
    {
        return view('academician/obs/notelist');
    }

    public function studentnotelist()
    {
        return view('academician/obs/studentnotelist');
    }

    public function updatenote()
    {
        return view('academician/obs/updatenote');
    }
}
