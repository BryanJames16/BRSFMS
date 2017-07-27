<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Document;
use \Illuminate\Validation\Rule;

require_once(app_path() . "/includes/pktool.php");

use StaticCounter;
use SmartMove;

class DocumentRequestController extends Controller 
{
    public function index() {
        

        return view('document-request');
    }

    public function refresh() {

    }

    public function store() {

    }

    public function view() {

    }

    public function nextPK() {

    }

    public function update() {

    }
}