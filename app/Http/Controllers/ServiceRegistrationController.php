<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Service;
use \App\Models\Servicetype;

class ServiceRegistrationController extends Controller
{
   public function index() {
 
        return view('service-registration');
    }

    public function store(Request $r) {
      
    }

    public function refresh(Request $r) {
       
    }

    public function getEdit(Request $r) {
        
       
    }

    public function edit(Request $r)
    {

    }

    public function delete(Request $r)
    {

    }

}
