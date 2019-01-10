<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class orders extends Controller
{
    public function  getOrders(){
        $orders = \App\orders::all();
        return view('orders',['orders'=>$orders]);
    }
}
