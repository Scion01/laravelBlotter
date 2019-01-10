<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class columns extends Controller
{
    public function  getColumns(){
        $columns = \App\columns::all();
        return view('columns',['columns'=>$columns]);
    }
}
