<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function countAll() {
    	$cresidents = Resident::where("status", "=", 1)->count();
        $cfamily = Family::where("archive", "=", 0)->count();
        $cpendingres = Reservation::where("status", "=", "Pending")->count();
        $cpendingser = Servicetransaction::where("status", "=", "Pending")
                                ->where('archive','=',0)
                                ->count();
        $crequest = Documentrequest::where("status", "=", "Pending")->count();
        $capproval = Documentrequest::where("status", "=", "Waiting for approval")->count();

        return back()->with('cresidents', $cresidents)
                                ->with('cfamily', $cfamily)
                                ->with('cpendingres', $cpendingres)
                                ->with('cpendingser', $cpendingser)
                                ->with('crequest', $crequest)
                                ->with('capproval', $capproval);
    }
}
