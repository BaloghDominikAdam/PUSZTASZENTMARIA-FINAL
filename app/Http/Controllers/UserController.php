<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class UserController extends Controller
{
    public function reg(Request $req){
        if(!Auth::check()){
            return view('reg');
        } else {
            return redirect('/profil');
        }
    }


    public function regData(Request $req){
        if(!Auth::check()) {
            $req->validate([
                'nev' => 'required',
                'email' => 'required|email|unique:user,email',
                'password' => ['required', 'confirmed', Password::min(8)->numbers()->letters()->mixedCase()],
                'password_confirmation' => 'required'
            ],[
                'nev.required' => 'Kötelező megadni a nevet!',
                'email.required' => 'Emailt kötelező megadni!',
                'email.email' => 'Valid emailt adjon meg!',
                'password.required' => 'Jelszót kötelező megadni!',
                'password.confirmed'                => 'Nem egyezik meg a két jelszó!',
                'password.min' => 'Minimum 8 karaktert adjon meg',
                'password_confirmation.required' => 'Kötelező megadni!'

            ]);
            $data                   = new User;
            $data->nev             = $req->nev;
            $data->email            = $req->email;
            $data->password         = Hash::make($req->password);
            $data->Save();
            return redirect('/login')->withErrors(['sv' => 'Sikeres regisztráció!']);
        } else {
            return view('/reg')->withErrors(['sv' => 'Az oldal elérhetőségéért jelentkezzen be!']);
        }

    }

    public function Login(){
        if(!Auth::check()){
            return view('/login');
        } else {
            return redirect ('/profil');
        }
    }
    public function LoginData(Request $req){
        if(!Auth::check()){
            $req->validate([
                'nev'   => 'required',
                'password'      => 'required'
            ],[
                'nev.required'  => 'Kötelező megadni!',
                'password.required'     => 'Kötelező megadni!'
            ]);

            if(Auth::attempt(['nev' => $req->nev, 'password' => $req->password])){
                return redirect('/profil')->withErrors(['sv' => 'Sikeresen beléptél!']);
            } else{
                return redirect('/login')->withErrrors(['sv' => 'A belépés sikertelen!']);
            }
        } else {
            return redirect('/profil');
        }

    }
    public function Profil(){
        if(Auth::check()){
            return view('Profil');
        } else{
            return redirect('/login', [
                'sv' => "Kérem lépjen be!"
            ]);
        }
    }

    public function Logout(){
        Auth::Logout();
        return redirect('/');
    }

    public function Newpass(){
        if(Auth::check()){
            return view('newpass');
        } else {
            return redirect('/login', [
                'sv' => "Kérem lépjen be!"
            ]);
        }
    }

    public function NewpassData(Request $req){
        $req->validate([
            'oldpassword'                          => 'required',
            'newpassword'                          => ['required', 'confirmed', Password::min(8)->numbers()->letters()->mixedCase()],
            'newpassword_confirmation'             => 'required'
        ],[
            'oldpassword.required'                 => 'Kötelező megadni a régi jelszót!',
            'newpassword.required'                 => 'Kérem adjon meg egy jelszót!',
            'newpassword.confirmed'                => 'A két jelszó nem egyezik!',
            'newpassword.min'                      => 'A jelszó minimum 8 karakter legyen!',
            'newpassword_confirmation_required.'   => 'Kérem adja meg a jelszót mégegyszer!'
        ]);

        if(Hash::check($req->oldpassword, Auth::user()->password)){
            $data                      = User::find(Auth::user()->user_id);
            $data->password            = Hash::make($req->newpassword);
            $data->Save();
            return view('success', [
                'msg' => 'Sikeresen megváltoztatta a jelszavát! '.$req->nev]);
        } else {
            return redirect('/login')->withErrors([
                'sv'    => "A kívánt oldal megtekintéséhez be kell jelentkezni!"
            ]);
        }
    }
}
