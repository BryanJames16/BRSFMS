<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Resident;
use \App\Models\User;
use \App\Models\Unit;
use \App\Models\Street;
use \App\Models\Family;
use \App\Models\Message;
use \App\Models\Utility;
use \App\Models\Generaladdress;
use \App\Models\Familymember;
use \App\Models\Residentbackground;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

require_once(app_path() . '/Includes/pktool.php');

use StaticCounter;
use SmartMove;

class UsersController extends Controller
{

    

    public function index() {
    	$us = User::select('id','name','email','imagePath', 'firstName','middleName','lastName','position',
                            'approval','resident','request','reservation','service','sponsorship','business',
                            'collection','accept')
                            -> where('position','!=','Chairman')
                            -> where('accept','=',1)
                            -> where('archive','=',0)
                            -> get();

        $pendings = User::select('id','name','email','imagePath', 'firstName','middleName','lastName','position','approval','accept')
                            -> where('position','!=','Chairman')
                            -> where('accept','=',0)
                            -> where('archive','=',0)
                            -> get();
        
        
    	return view('users')-> with('us', $us)
                                -> with('pendings', $pendings);
    }

    public function refresh(Request $r) {
        if ($r -> ajax()) {
            return json_encode(User::select('id','name','imagePath','email', 'firstName','middleName','lastName','position','approval','accept')
                            -> where('position','!=','Chairman')
                            -> where('accept','=',1)
                            -> where('archive','=',0)
                            -> get());
        }
        else {
            return view('errors.403');
        }
    }

    public function getMessage(Request $r) {
        if ($r -> ajax()) {
            return json_encode(Message::select('messages.id','senderID','receiverID','content','dateSent','isRead', 'firstName','middleName','lastName')
                            ->join('users', 'users.id', '=', 'messages.senderID')
                            -> where('messages.id','=',$r->input('id'))
                            -> get());
        }
        else {
            return view('errors.403');
        }
    }

    public function reply(Request $r) {


            
        $aah = Message::insert(['content'=>($r->input('content')),
                                            'senderID'=>$r->input('senderID'),
                                               'receiverID'=>$r->input('receiverID'),
                                               'dateSent'=> Carbon::now()]);
       return back();
             
    }

    public function create(Request $r) {

        $id = Auth::id();
            
        $aah = Message::insert(['content'=>($r->input('content')),
                                            'senderID'=> $id,
                                               'receiverID'=>$r->input('receiverID'),
                                               'dateSent'=> Carbon::now()]);
       return back();
             
    }


    public function read(Request $r) {
        if ($r->ajax()) {
            $type = Message::find($r->input('id'));
            $type->isRead = 1;
            $type->save();
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function pendingRefresh(Request $r) {
        if ($r -> ajax()) {
            return json_encode(User::select('id','name','email', 'firstName','middleName','lastName','position','approval','accept')
                            -> where('position','!=','Chairman')
                            -> where('accept','=',0)
                            -> where('archive','=',0)
                            -> get());
        }
        else {
            return view('errors.403');
        }
    }

    public function accept(Request $r) {
        if ($r->ajax()) {
            $type = User::find($r->input('id'));
            $type->accept = 1;
            $type->save();
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function reject(Request $r) {
        if ($r->ajax()) {
            $type = User::find($r->input('id'));
            $type->archive = 1;
            $type->save();
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function approvalAllow(Request $r) {
        if ($r->ajax()) {
            $type = User::find($r->input('id'));
            $type->approval = 1;
            $type->save();
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function approvalRestrict(Request $r) {
        if ($r->ajax()) {
            $type = User::find($r->input('id'));
            $type->approval = 0;
            $type->save();
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function residentAllow(Request $r) {
        if ($r->ajax()) {
            $type = User::find($r->input('id'));
            $type->resident = 1;
            $type->save();
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function residentRestrict(Request $r) {
        if ($r->ajax()) {
            $type = User::find($r->input('id'));
            $type->resident = 0;
            $type->save();
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function requestAllow(Request $r) {
        if ($r->ajax()) {
            $type = User::find($r->input('id'));
            $type->request = 1;
            $type->save();
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function requestRestrict(Request $r) {
        if ($r->ajax()) {
            $type = User::find($r->input('id'));
            $type->request = 0;
            $type->save();
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function reservationAllow(Request $r) {
        if ($r->ajax()) {
            $type = User::find($r->input('id'));
            $type->reservation = 1;
            $type->save();
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function reservationRestrict(Request $r) {
        if ($r->ajax()) {
            $type = User::find($r->input('id'));
            $type->reservation = 0;
            $type->save();
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function serviceAllow(Request $r) {
        if ($r->ajax()) {
            $type = User::find($r->input('id'));
            $type->service = 1;
            $type->save();
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function serviceRestrict(Request $r) {
        if ($r->ajax()) {
            $type = User::find($r->input('id'));
            $type->service = 0;
            $type->save();
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function businessAllow(Request $r) {
        if ($r->ajax()) {
            $type = User::find($r->input('id'));
            $type->business = 1;
            $type->save();
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function businessRestrict(Request $r) {
        if ($r->ajax()) {
            $type = User::find($r->input('id'));
            $type->business = 0;
            $type->save();
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function collectionAllow(Request $r) {
        if ($r->ajax()) {
            $type = User::find($r->input('id'));
            $type->collection = 1;
            $type->save();
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function collectionRestrict(Request $r) {
        if ($r->ajax()) {
            $type = User::find($r->input('id'));
            $type->collection = 0;
            $type->save();
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function sponsorshipAllow(Request $r) {
        if ($r->ajax()) {
            $type = User::find($r->input('id'));
            $type->sponsorship = 1;
            $type->save();
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function sponsorshipRestrict(Request $r) {
        if ($r->ajax()) {
            $type = User::find($r->input('id'));
            $type->sponsorship = 0;
            $type->save();
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }
  
}

