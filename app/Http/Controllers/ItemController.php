<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Item;
use Carbon\Carbon;

class ItemController extends Controller
{
    public function index() {
        $all_safe = Item::where('archive', '!=', '1') -> get();
        return view('item') -> with('listOfItems', $all_safe);
    }

    public function refresh(Request $r) {
        if ($r -> ajax()) {
            $all_safe = Item::where('archive', '!=', '1') -> get();
            return json_encode($all_safe);
        }
        else {
            return redirect('errors.403');
        }

        return redirect('item');
    }

    public function store(Request $r) {
        if ($r -> ajax()) {
            $stat = 0;

            if($r -> input('status') =="active") {
                $stat = 1;
            }
            else if($r -> input('status') =="inactive") {
                $stat = 0;
            }
            else {
                
            }

            $insertItem = Item::insert(['itemName' => trim($r -> input('itemName')),
                                        'itemDescription' => trim($r -> input('itemDescription')),
                                        'itemQuantity' => $r -> input('itemQuantity'), 
                                        'itemPrice' => $r -> input('itemPrice'), 
                                        'quality' => $r -> input('quality'),  
                                        'archive' => 0, 
                                        'status' => $stat]);
        }
        else {
            return redirect('errors.403');
        }

        return redirect('item');
    }

    public function delete(Request $r) {
        if ($r -> ajax()) {
            $item = Item::find($r -> input('itemID'));
            $item -> archive = 1;
            $item -> save();
            return redirect('item');
        }
        else {
            return redirect('errors.403');
        }

        return redirect('item');
    }

    public function getEdit(Request $r) {
        if ($r -> ajax()) {
            return response(Item::where("itemID", "=", $r -> input('itemID')) 
                                -> where("archive", "!=", "1") 
                                -> get());
        } 
        else {
            return redirect('errors.403');
        }

        return redirect('item');
    }

    public function update(Request $r) {
        if ($r -> ajax()) {
            $item = Item::find($r -> input('itemID'));
            $item -> itemName = $r -> input('itemName');
            $item -> itemDescription = $r -> input('itemDescription');
            $item -> itemQuantity = $r -> input('itemQuantity');
            $item -> itemPrice = $r -> input('itemPrice');
            $item -> status = $r -> input('stat');
            $item -> save();

            return redirect('item');
        }
        else {
            return redirect('errors.403');
        }

        return redirect('item');
    }
}
