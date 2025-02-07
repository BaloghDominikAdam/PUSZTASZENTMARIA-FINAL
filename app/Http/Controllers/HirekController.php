<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hirek;

class HirekController extends Controller
{
    public function hirek(){
        return view('hirek', [
            'result' =>Hirek::OrderBy('date', 'DESC')
                     ->get(),
        ]);
    }
}
