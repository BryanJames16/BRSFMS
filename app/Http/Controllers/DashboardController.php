<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Document;
use \Illuminate\Validation\Rule;

require_once(app_path() . '/Includes/pktool.php');

use StaticCounter;
use SmartMove;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard');
    }

    public function getRawData() {

    }
    
    public function getCard() {

    }

    public function getGraph() {

    }

    public function getTable() {

    }

    public function getChart() {

    }
}