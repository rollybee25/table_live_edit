<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sample;

class ServerSideController extends Controller
{
    //

    

    function getSampleData(Request $request)
    {
        function check($value){
            if($value == 'true') {
                return 'checked';
            } else {
                return '';
            }
        }

        $totalFilteredRecord = $totalDataRecord = $draw_val = "";
        $columns_list = array(
            0 => 'id',
            1 => 'first_name',
            2 => 'last_name',
            3 => 'gender',
            4 => 'checkmark',
            5 => 'action'
        );
        
        $totalDataRecord = Sample::count();
        
        $totalFilteredRecord = $totalDataRecord;
        
        $limit_val = $request->input('length');
        $start_val = $request->input('start');
        $order_val = $columns_list[$request->input('order.0.column')];
        $dir_val = $request->input('order.0.dir');
        
        if(empty($request->input('search.value')))
        {
        $post_data = Sample::offset($start_val)
        ->limit($limit_val)
        ->orderBy($order_val,$dir_val)
        ->get();
        }
        else {
        $search_text = $request->input('search.value');
        
        $post_data =  Sample::where('id','LIKE',"%{$search_text}%")
        ->orWhere('first_name', 'LIKE',"%{$search_text}%")
        ->orWhere('last_name', 'LIKE',"%{$search_text}%")
        ->offset($start_val)
        ->limit($limit_val)
        ->orderBy($order_val,$dir_val)
        ->get();
        
        $totalFilteredRecord = Sample::where('id','LIKE',"%{$search_text}%")
            ->orWhere('first_name', 'LIKE',"%{$search_text}%")
            ->orWhere('last_name', 'LIKE',"%{$search_text}%")
            ->count();
        }
        
        $data_val = array();
        if(!empty($post_data))
        {
            foreach ($post_data as $post_val)
            {
            // $datashow =  route('posts_table.show',$post_val->id);
            // $dataedit =  route('posts_table.edit',$post_val->id);
            
            $checkmark = check($post_val->checkmark);


            
            $postnestedData['id'] = $post_val->id;
            $postnestedData['first_name'] = $post_val->first_name;
            $postnestedData['last_name'] = $post_val->last_name;
            $postnestedData['gender'] = $post_val->gender;
            $postnestedData['checkmark'] =  $post_val->checkmark;
            $postnestedData['action'] = "dfd";
            $data_val[] = $postnestedData;
            
            }
        }
        $draw_val = $request->input('draw');
        $get_json_data = array(
        "draw"            => intval($draw_val),
        "recordsTotal"    => intval($totalDataRecord),
        "recordsFiltered" => intval($totalFilteredRecord),
        "data"            => $data_val
        );
        
        echo json_encode($get_json_data);
    }
}
