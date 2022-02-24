<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserPrivelegeController extends Controller
{
    //
    function index()
    {
        return view('userprivelege');
    }

    function updateUserPrivelege(Request $request)
    {
        if($request->ajax())
        {
            $data = array(
                $request->column_name       =>  $request->column_value
            );
            DB::table('user_priveleges')
                ->where('user_id', $request->id)
                ->update($data);
        }
    }

}
