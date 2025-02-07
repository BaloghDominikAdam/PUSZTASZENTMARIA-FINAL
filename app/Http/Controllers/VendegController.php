<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendeg;
use Illuminate\Support\Facades\Auth;

class VendegController extends Controller
{
    public function vendeg(){
        return view('vendeg', [
            'result' => Vendeg::OrderBy('date', 'DESC')
                     ->get(),
        ]);
    }

    public function vendegData(Request $req){
        if(Auth::check()){
            $req->validate([
                'nev' => 'required',
                'email' => 'required|email',
                'message' => 'required'
            ],[
                'nev.required' => 'A nevét kötelező megadni!',
                'email.required' => 'Az emailt kötelező megadni!',
                'email.email' => 'Valid emailt adjon meg!',
                'message.required' => 'Üzenetet kötelező megadni!'
            ]);
            $data = new Vendeg;
            $data->nev = $req->nev;
            $data->email = $req->email;
            $data->message = $req->message;
            $data->date = date("Y-d-m");
            $data->Save();
            return redirect('/vendeg')->withErrors(['sv' => 'Sikeres regisztráció!']);
        } else {
            return view('/reg')->withErrors(['sv' => 'Ha szeretne a vendégkönyvbe írni kérem jelentkezzen be!']);
        }


    }
}
