<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sample;
use App\Models\UserPrivelege;

class ServerSideController extends Controller
{
    //

    function getUserPrivelegeData(Request $request)
    {
        function check($value, $name){
            $is_checked = '';
            if($value == 'Yes') {
                $is_checked = ' checked ';
            }
            return '<input type="checkbox" class="column_name"'.$is_checked.' id="'.$name.'" />';
        }

        
        
        

        $totalFilteredRecord = $totalDataRecord = $draw_val = "";
        $columns_list = array(
            0 => 'id',
            1 => 'user_id',
        );
        
        $totalDataRecord = UserPrivelege::count();
        
        $totalFilteredRecord = $totalDataRecord;
        
        $limit_val = $request->input('length');
        $start_val = $request->input('start');
        $order_val = $columns_list[$request->input('order.0.column')];
        $dir_val = $request->input('order.0.dir');
        
        if(empty($request->input('search.value')))
        {
        $post_data = UserPrivelege::offset($start_val)
        ->limit($limit_val)
        ->orderBy($order_val,$dir_val)
        ->get();
        }
        else {
        $search_text = $request->input('search.value');
        
        $post_data =  UserPrivelege::where('id','LIKE',"%{$search_text}%")
        ->offset($start_val)
        ->limit($limit_val)
        ->orderBy($order_val,$dir_val)
        ->get();
        
        $totalFilteredRecord = UserPrivelege::where('id','LIKE',"%{$search_text}%")
            ->count();
        }
        
        $data_val = array();
        if(!empty($post_data))
        {
            foreach ($post_data as $post_val)
            {
            // $datashow =  route('posts_table.show',$post_val->id);
            // $dataedit =  route('posts_table.edit',$post_val->id);
            
           


            
            $postnestedData['id'] = $post_val->id;
            $postnestedData['user_id'] = $post_val->user_id;
            $postnestedData['summary'] = check($post_val->summary, 'summary');
            $postnestedData['view_list'] = check($post_val->view_list, 'view_list');
            $postnestedData['edit_list'] = check($post_val->edit_list, 'edit_list');
            $postnestedData['copy_list'] = check($post_val->copy_list, 'copy_list');
            $postnestedData['track_list'] = check($post_val->track_list, 'track_list');
            $postnestedData['cancel_list'] = check($post_val->cancel_list, 'cancel_list');
            $postnestedData['calendar'] = check($post_val->calendar, 'calendar');
            $postnestedData['download'] = check($post_val->download, 'download');
            $postnestedData['kpi_jobs'] = check($post_val->kpi_jobs, 'kpi_jobs');
            $postnestedData['kpi_inspector'] = check($post_val->kpi_inspector, 'kpi_inspector');
            $postnestedData['kpi_report'] = check($post_val->kpi_report, 'kpi_report');
            $postnestedData['kpi_report_team'] = check($post_val->kpi_report_team, 'kpi_report_team');
            $postnestedData['kpi_booking'] = check($post_val->kpi_booking, 'kpi_booking');
            $postnestedData['new_project'] = check($post_val->new_project, 'new_project');
            $postnestedData['project_template'] = check($post_val->project_template, 'project_template');
            $postnestedData['client_new'] = check($post_val->client_new, 'client_new');
            $postnestedData['client_viewedit'] = check($post_val->client_viewedit, 'client_viewedit');
            $postnestedData['client_tic'] = check($post_val->client_tic, 'client_tic');
            $postnestedData['client_ticsera'] = check($post_val->client_ticsera, 'client_ticsera');
            $postnestedData['factory'] = check($post_val->factory, 'factory');
            $postnestedData['supplier'] = check($post_val->supplier, 'supplier');
            $postnestedData['user'] = check($post_val->user, 'user');
            $postnestedData['inspector'] = check($post_val->inspector, 'inspector');
            $postnestedData['sales'] = check($post_val->sales, 'sales');
            $postnestedData['action'] = $post_val['summary'];
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
