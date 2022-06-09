<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\article;
use App\images;
use Illuminate\Support\Facades\Crypt;

class IndexController extends Controller
{
    // from home page
    public function index(){
        $location=article::where('objectif','=','Location')->where('status','=',1)->orderBy('id','DESC')->take(3)->get();
        $vente=article::where('objectif','=','Vente')->where('status','=',1)->orderBy('id','DESC')->take(3)->get();
        $lieu=article::select('lieu')->distinct()->where('status','=',1)->get();
        return view('welcome')->with(compact('location','vente','lieu'));
    }

    public function SearchHome(Request $request){
        $data=$request->all();
        $annonces=article::where('status','=',1)->where('objectif','=',$data['objectif'])->where('lieu','like',$data['region'].'%')->where('type','=',$data['type'])->paginate(6);
        return view('vitrine.annonces')->with(compact('annonces'));
    }

    //from annonces page

    public function getannonces(){
        $annonces=article::where("status","=",1)->paginate(6);
        return view('vitrine.annonces')->with(compact('annonces'));
    }

    public function SearchAnnonces(Request $request){
        $data=$request->all();
        $annonces=article::where('lieu','like','%'.$data['lieu'].'%')->where("status","=",1)->paginate(6);
        return view('vitrine.annonces')->with(compact('annonces'));
    }

    public function Sort(Request $request){
        $data=$request->all();
        if($data['sort'] == "date"){
            $annonces=article::where("status","=",1)->orderby('date','DESC')->paginate(6);
            return view('vitrine.annonces')->with(compact('annonces'));
        }

        if($data['sort'] == "prix"){
            $annonces=article::where("status","=",1)->orderby('prix','DESC')->paginate(6);
            return view('vitrine.annonces')->with(compact('annonces'));
        }

        if($data['sort'] == "superficie"){
            $annonces=article::where("status","=",1)->orderby('superficie','DESC')->paginate(6);
            return view('vitrine.annonces')->with(compact('annonces'));
        }

        return back()->with('flash_message_error','Aucun clef de tri');
    }

    public function Rechercherapide(Request $request){
        $data=$request->all();
        $superficie=explode("-",$data['superficie']);
        $prix=explode("-",$data['prix']);
        $annonces=article::where(["type"=>$data['type'],"objectif"=>$data['objectif'],"status"=>1])->where('lieu','like',$data['region'].'%')->where("superficie",'>=',$superficie[0])->where("superficie",'<=',$superficie[1])->where("prix",'>=',$prix[0])->where("prix",'<=',$prix[1])->paginate(6);
        return view('vitrine.annonces')->with(compact('annonces'));
    }


    //Détail article

    public function voirdetail($id){
        $dec=Crypt::decryptString($id);
        $article=article::find($dec);
        $foryou=article::where('objectif','=',$article->objectif)->where('type','=',$article->type)->take(4)->get();
        $ImageSimilaire=images::where('id_article','=',$article->id)->get();
        return view('vitrine.detail')->with(compact('article','foryou','ImageSimilaire'));
    }


}
