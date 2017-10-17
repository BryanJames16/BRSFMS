<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Utility;
use \Illuminate\Validation\Rule;

class UtilitiesController extends Controller
{
    public function index() {
        $utilities = Utility::all();
        return view('utilities') -> with('utilities', $utilities);
    }

    public function refresh(Request $r) {
        if ($r -> ajax()) {
            return json_encode(\DB::table('utilities') ->select('facilityPK',
                                                    'documentPK', 'servicePK',
                                                     'residentPK',
                                                    'familyPK', 'docRequestPK','docApprovalPK','reservationPK',
                                                     'serviceRegPK','sponsorPK','collectionPK') 
                                        ->get());
        }
        else {
            return view('errors.403');
        }
    }

    public function getCurrentPK(Request $r) {
        if ($r -> ajax()) {
            return response(Utility::all()->last());
        }
        else {
            return view('errors.403');
        }
    }


    public function update(Request $r) {
        if ($r->ajax()) {
            $utilityRow = Utility::all()->last(); 

            if(is_null($utilityRow))
            {
                $insertRet = Utility::insert(['documentPK' => $r -> input('serviceTransactionPrimeID'),
                                                'docApprovalPK' => $r -> input('docApprovalPK'),
                                                'facilityPK' => $r -> input('facilityPK'),
                                                'familyPK' => $r -> input('familyPK'),
                                                'reservationPK' => $r -> input('reservationPK'),
                                                'residentPK' => $r -> input('residentPK'),
                                                'servicePK' => $r -> input('servicePK'),
                                                'serviceRegPK' => $r -> input('serviceRegPK'),
                                                'sponsorPK' => $r -> input('sponsorPK'),
                                                'collectionPK' => $r -> input('collectionPK'),
                                                'docRequestPK' => $r -> input('docRequestPK')]);   
            }
            else
            {
                $utilityRow = Utility::all()->last(); 
                $utilityRow -> documentPK = $r -> input('documentPK');
                $utilityRow -> docApprovalPK = $r -> input('docApprovalPK');
                $utilityRow -> docRequestPK = $r -> input('docRequestPK'); 
                $utilityRow -> facilityPK = $r -> input('facilityPK');
                $utilityRow -> familyPK  = $r -> input('familyPK');
                $utilityRow -> reservationPK = $r -> input('reservationPK');
                $utilityRow -> residentPK = $r -> input('residentPK');
                $utilityRow -> servicePK  = $r -> input('servicePK');
                $utilityRow -> serviceRegPK = $r -> input('serviceRegPK');
                $utilityRow -> collectionPK = $r -> input('collectionPK');
                $utilityRow -> sponsorPK = $r -> input('sponsorPK');
                $utilityRow -> save();
                
                
            }

            return redirect('/utilities');
            
        }
        else {
            return view('errors.403');
        }
    }

    public function saveInfo(Request $r){
            
            $ut = Utility::find('1');
            $s = '';
            $b = '';
            $p = '';

           if($r->imageSign!='')
           {
                $s = $sign = $r->imageSign->getClientOriginalName();
                $r->imageSign->storeAs('public/upload', $sign);
                $ut->signaturePath = $sign;
           }
           if($r->imageBrgy!='')
           {
                $brgy = $r->imageBrgy->getClientOriginalName();
                $r->imageBrgy->storeAs('public/upload', $brgy);
                $ut->brgyLogoPath = $brgy;
           }
           if($r->imageProvince!='')
           {
                $prov = $r->imageProvince->getClientOriginalName();
                $r->imageProvince->storeAs('public/upload', $prov);
                $ut->provLogoPath = $prov;
           }

            $ut->address = $r->input('address');
            $ut->barangayName = $r->input('barangayName');
            $ut->yearsOfExpiration = $r->input('yearsOfExpiration');
            $ut->barangayIDAmount = $r->input('idAmount');
            $ut->save();

            return back();
    }
}