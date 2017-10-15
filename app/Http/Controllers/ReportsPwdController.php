<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsPwdController extends Controller
{
    public function index() {
        return view('report-pwd');
    }

    public function fetch() {
        return view('collection-report');
    }
}
