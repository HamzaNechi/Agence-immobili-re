<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contact;

class ContactController extends Controller
{

    public function index(){
        $contact=contact::all();
        return view('dashboard.contact.contact')->with(compact('contact'));
    }


    public function AjouterContact(Request $request){
        $data=$request->all();
        $contact=new contact();
        $contact->nom=$data['nom'];
        $contact->tel=$data['tel'];
        $contact->message=$data['msg'];
        if($data['ref'] != "0000" && $data['id_article'] != "0"){
            $contact->ref_article=$data['ref'];
            $contact->id_article=$data['id_article'];
        }
        $contact->save();
        return back()->with('flash_message_success','Votre message est bien réçus');
    }


    //Supprimer tous les message
    public function DeleteAll(){
        $contact=contact::all();
        foreach($contact as $c){
            $c->delete();
        }
        return back()->with('flash_message_success','Tous les messages des clients sont supprimé');
    }

    //Supprimer le messages séléctionnez
    public function DeleteSelected(Request $request){
        $data=$request->all();
        foreach($data['id'] as $tous => $val){
            $contact=contact::find($val);
            $contact->delete();
        }
        return back()->with('flash_message_success','Les messages séléctionnés sont supprimé avec succés');
    }
}
