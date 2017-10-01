<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Resident;
use \App\Models\User;
use \App\Models\Log;
use \App\Models\Unit;
use \App\Models\Street;
use \App\Models\Family;
use \App\Models\Utility;
use \App\Models\Generaladdress;
use \App\Models\Familymember;
use \App\Models\Residentbackground;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

require_once(app_path() . '/Includes/pktool.php');

use StaticCounter;
use SmartMove;

class LogsController extends Controller
{

    

    public function index() {
    	
        $id = Auth::user()->id;

        $usah= User::select('id','firstName', 'middleName','lastName')                 
                                        ->where('id','!=', $id)
                                        ->get();
        $all = \DB::table('logs') ->select('logID','action','dateOfAction','firstName','middleName','lastName','type') 
                                        ->join('users', 'users.id', '=', 'logs.userID')
                                        ->orderby('dateOfAction','desc')
                                        ->get();
        
        
    	return view('logs')->with('usah', $usah)
                            ->with('all', $all);
    }

    public function getLogs(Request $r) {
        if ($r -> ajax()) {
            return json_encode(\DB::table('logs') ->select('type','action','dateOfAction','firstName','middleName','lastName') 
                                        ->join('users', 'users.id', '=', 'logs.userID')
                                        ->orderby('dateOfAction','desc')
                                        ->get());
        }
        else {
            return view('errors.403');
        }
    }

    public function getUserLogs(Request $r) {
        if ($r -> ajax()) {
            return json_encode(\DB::table('logs') ->select('action' ,'dateOfAction','firstName','middleName','lastName','type') 
                                        ->join('users', 'users.id', '=', 'logs.userID')
                                        ->where('userID','=', $r->input('id'))
                                        ->orderby('dateOfAction','desc')
                                        ->get());
        }
        else {
            return view('errors.403');
        }
    }
  
}

