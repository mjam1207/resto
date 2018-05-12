<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App/Tblmenu;

class FoodController extends Controller
{
    public function getIndex() {
		$tblmenu = Tblmenu::paginate(7);
		return view('foods.index')->withTblmenu($tblmenu);
	}

    public function getSingle($slug) {
    	$tblmenu = Tblmenu::where('slug', '=' , $slug)->first();
    	return view('foods.single')->withTblmenu($tblmenu);
    }
}
