<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SearchController extends Controller
{
    public function index(){
        return view('autocomplete');
    }

    public function search(Request $request){
        $data = User::select('id','name','profile_image')->where('name', 'like',$request->key.'%')->get();
        return response()->json(array('data'=>$data));
    }

}
