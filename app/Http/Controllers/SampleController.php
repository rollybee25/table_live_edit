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
}
