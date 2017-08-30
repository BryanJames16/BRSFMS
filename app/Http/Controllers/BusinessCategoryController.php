<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Businesscategory;
use \Illuminate\Validation\Rule;

class BusinessCategoryController extends Controller
{
   public function index() {
        $businessCategories = BusinessCategory::select('categoryPrimeID', 'categoryName', 'categoryDesc', 'status')
                                                    -> where([
                                                                ['archive', '=', 0]
                                                                ])
                                                    -> get();

        return view('business-category') -> with('businessCategories', $businessCategories);
    }

    public function store(Request $r) {
        if ($r->ajax()) {
            $this->validate($r, [
                
                'categoryName' => 'required|unique:businesscategories|max:30',
                ]);

            if($_POST['stat']=="active") {
                $stat = 1;
            }
            else if($_POST['stat']=="inactive") {
                $stat = 0;
            }

            $insertRet = BusinessCategory::insert(['categoryName'=>trim($r->categoryName),
                                                    'archive'=>0,
                                                    'categoryDesc'=>trim($r->desc),
                                                    'status'=>$stat]);


            return redirect('/business-category');
        }
        //else {
        //    return view('errors.403');
        //}

        $this->validate($r, [
            
            'categoryName' => 'required|unique:businesscategories|max:30',
            ]);

        if($_POST['stat']=="active") {
            $stat = 1;
        }
        else if($_POST['stat']=="inactive") {
            $stat = 0;
        }

        $insertRet = BusinessCategory::insert(['categoryName'=>trim($r->categoryName),
                                                'archive'=>0,
                                                'categoryDesc'=>trim($r->desc),
                                                'status'=>$stat]);


        return redirect('/business-category');
    }

    public function getEdit(Request $r) {
        if($r->ajax()) {
            return response(BusinessCategory::find($r->categoryPrimeID));
        }
        else {
            return view('errors.403');
        }
    }

    public function edit(Request $r)
    {
    
            $this->validate($r, [
                'categoryName' => ['required',  'max:30', Rule::unique('businesscategories')->ignore($r->input('category_ID'), 'categoryPrimeID')],
                ]);

            $category = BusinessCategory::find($r->input('category_ID'));
            $category->categoryName = $r->input('categoryName');
            $category->categoryDesc = $r->input('category_desc');
            $category->status = $r->input('stat');
            $category->save();
            return redirect('business-category');
      
    }

    public function delete(Request $r)
    {
       
            $category = BusinessCategory::find($r->input('categoryPrimeID'));
            $category->archive = true;
            $category->save();
            return redirect('business-category');
     
    }
}
