<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function blotter(){
        $columns = \App\columns::all();
        $orders = \App\orders::all();
        return view('blotter',['orders'=>$orders,'columns'=>$columns]);
    }
}
