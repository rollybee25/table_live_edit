<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampleController extends Controller
{
    //
    function index()
    {
        return view('live_table_edit');
    }

    function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->action == 'edit')
    		{
    			$data = array(
    				'first_name'	=>	$request->first_name,
    				'last_name'		=>	$request->last_name,
    				'gender'		=>	$request->gender
    			);
    			DB::table('sample_datas')
    				->where('id', $request->id)
    				->update($data);
    		}
    		if($request->action == 'delete')
    		{
    			DB::table('sample_datas')
    				->where('id', $request->id)
    				->delete();
    		}
    		return response()->json($request);
    	}
    }

}
