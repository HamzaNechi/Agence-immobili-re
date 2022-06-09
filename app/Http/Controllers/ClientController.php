<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;
use App\client;
use Illuminate\Support\Facades\Crypt;
use Image;

class ClientController extends Controller
{

    

    public function index(){
        $client=client::all();
        return view('dashboard.client.client')->with(compact('client'));
    }


    public function AjouterArticleClient(Request $request){
        $data=$request->all();
        $client=new client();
        $client->nom=$data['nom_client'];
        $client->email=$data['email'];
        $client->tel=$data['tel'];
        $client->save();

        $last=client::latest()->first();
        $id_client=$last['id'];

        app('App\Http\Controllers\ClientController')->AjouterAnnonce($data,$id_client);

        return back()->with("flash_message_success","Votre annonce est en cours de ....");
    }


    public function AjouterAnnonce($data,$client){
        $lieu=$data['région'].', '.$data['lieu'];
        $ref=app('App\Http\Controllers\ClientController')->GenerateRef($data['objectif'],$data['type']);
        $article=new article();
        $article->nom=$data['nom'];
        $article->type=$data['type'];
        $article->lieu=$lieu;
        $article->superficie=$data['superficie'];
        $article->prix=$data['prix'];
        $article->date=date("Y-m-d");
        $article->objectif=$data['objectif'];
        if($data['objectif']=="Location"){
            $article->louerpar=$data['louerpar'];
        }
        $article->ref=$ref;
        /*****Resize and add image */
        
            $image_tmp=$data['image'][0];
            if($image_tmp->isValid()){
            $extension =$image_tmp->getClientOriginalExtension();
            
            $filename=rand(111,999).'.'.$extension;
            $large_image_path='img/l/'.$filename;
            $medium_image_path='img/m/'.$filename;
            $small_image_path='img/s/'.$filename;
            //Resize Images
            Image::make($image_tmp)->resize(755,400)->save($large_image_path);
            Image::make($image_tmp)->resize(360,240)->save($medium_image_path);
            Image::make($image_tmp)->resize(80,80)->save($small_image_path);

            }

            $article->image=$filename;
        
        /*** end image */
        $article->description=$data['description'];
        $article->status=0;
        $article->id_client=$client;
        $article->save();
        
        //Get last inserted id and concatenate with reef
        $lastinserted=article::latest()->first();
        $lastinserted->ref.=$lastinserted->id;
        $lastinserted->update();

    }


    public function GenerateRef($objectif,$type){
        $ch="";
        if($objectif == "Location"){
            $ch.="L";
        }else{
            $ch.="V";
        }

        $types=explode(" ",$type);
        if(sizeof($types)<2){
            $ch.="M";
        }else{
            $t=strtoupper($types[0][0]).strtoupper($types[1][0]);
            $ch.=$t;
        }
        return $ch;
    }

    public function AffcherArticleClient($client){
        $dec=Crypt::decryptString($client);
        $location=article::where('objectif','=','Location')->where('id_client','=',$dec)->orderBy('id','DESC')->paginate(12);
        $vente=article::where('objectif','=','Vente')->where('id_client','=',$dec)->orderBy('id','DESC')->paginate(12);
        $client=client::all();
        return view('dashboard.articles.article')->with(compact('location','vente','client'));
    }

    public function supprimerclient(Request $request){
        $id=$request->get('id');
        //Supprimer les articles de cet client
        $article=article::where('id_client','=',$id)->get();
        foreach($article as $a){
            $a->delete();
        }
        //Supprimer client
        $client=client::find($id);
        $client->delete();
        return back()->with('flash_message_success','Le client est supprimé avec ses annonces');
    }

    //Supprimer all
    public function SupprimerTousSelectionnez(Request $request){
        $ids=$request->get('id');
        foreach($ids as $id){
            //Supprimer les articles de cet client
            $article=article::where('id_client','=',$id)->get();
            foreach($article as $a){
                $a->delete();
            }
            //Supprimer le client
            $client=client::find($id);
            $client->delete();

        }
        return back()->with('flash_message_success','Les client sont supprimé avec succé');
    }


     
}
