<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\article;
use App\client;
use Hash;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countart=article::count();
        $countloc=article::where('objectif','=','Location')->count();
        $countvnt=article::where('objectif','=','Vente')->count();
        $countclient=client::count();
        return view('home')->with(compact('countart','countloc','countvnt','countclient'));
    }


    public function updatepassword(Request $request){
        $id=$request->user_id;
        $admin=User::find($id);
        if ($request->new != "") {
            if(Hash::check($request->old,$admin->password)){
            $new=Hash::make($request->new);
            $admin->password=$new;
            }else{
                return redirect('/logout');
            }
        }
        $admin->update();
        return back()->with('flash_message_success','Votre mot de passe est bien modifié');
    }
}
