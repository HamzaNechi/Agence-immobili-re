<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\article;
use App\images;
use App\client;
use Illuminate\Support\Facades\Crypt;
use Image;

class ArticleController extends Controller
{


    public function index(){
        $location=article::where('objectif','=','Location')->orderBy('id','DESC')->paginate(12);
        $vente=article::where('objectif','=','Vente')->orderBy('id','DESC')->paginate(12);
        $client=client::all();
        return view('dashboard.articles.article')->with(compact('location','vente','client'));
    }

    public function trierarticlepar($clef){
        if($clef == "superficie"){
            $location=article::where('objectif','=','Location')->orderby('superficie','DESC')->paginate(12);
            $vente=article::where('objectif','=','Vente')->orderby('superficie','DESC')->paginate(12);
            $client=client::all();
            return view('dashboard.articles.article')->with(compact('location','vente','client'));
        }

        if($clef == "prix"){
            $location=article::where('objectif','=','Location')->orderby('prix','DESC')->paginate(12);
            $vente=article::where('objectif','=','Vente')->orderby('prix','DESC')->paginate(12);
            $client=client::all();
            return view('dashboard.articles.article')->with(compact('location','vente','client'));
        }

        if($clef == "actif"){
            $location=article::where(['objectif'=>'Location','status'=> 1])->paginate(12);
            $vente=article::where(['objectif'=>'Vente','status'=> 1])->paginate(12);
            $client=client::all();
            return view('dashboard.articles.article')->with(compact('location','vente','client'));
        }

        if($clef =="attente"){
            $location=article::where(['objectif'=>'Location','status'=> 0])->paginate(12);
            $vente=article::where(['objectif'=>'Vente','status'=> 0])->paginate(12);
            $client=client::all();
            return view('dashboard.articles.article')->with(compact('location','vente','client'));
        }
    }


    public function addarticle(Request $request){
        
        $data=$request->all();
        // $data=json_decode(json_encode($data));
        // echo"<pre>";print_r($data);die;
        $article=new article();
        $article->nom=$data['nom'];
        $article->type=$data['type'];
        $article->lieu=$data['lieu'];
        $article->superficie=$data['superficie'];
        $article->prix=$data['prix'];
        $article->date=$data['date'];
        $article->objectif=$data['objectif'];
        if($data['objectif']=="Location"){
            $article->louerpar=$data['louerpar'];
        }
        $article->titre=$data['titre'];
        $article->ref=$data['ref'];
        /*****Resize and add image */
        if( $request->hasFile('image')){
            $image_tmp=Input::file('image');
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
        }
        /*** end image */
        $article->description=$data['description'];
        $article->status=1;
        $article->save();

        //Get last inserted and add to ref
        $last=article::latest()->first();
        $last->ref.=$last->id;
        $last->update();

        if($data['objectif']=="Vente"){
            return redirect('/articles/#tab6')->with('flash_message_success',"L'annonce est ajouté avec succés");
        }else{
            return redirect('/articles')->with('flash_message_success',"L'annonce est ajouté avec succés");
        }
        
    }

    public function voirdetail($id){
        $dec=Crypt::decryptString($id);
        $article=article::find($dec);
        $images=images::where('id_article','=',$id)->get();
        $related=article::where(['objectif'=>$article->objectif,'type'=>$article->type])->get();
        return view('dashboard.articles.detail')->with(compact('article','images','related'));
    }

    public function modifierStatus(Request $request){
        $id=$request->get('id');
        $status=$request->get('stat');
        $article=article::find($id);
        $article->status=$status;
        $article->update();
        return back()->with('flash_message_success','Le status est bien modifié');
    }


    public function destroy(Request $request){
        $id=$request->id;
        $article=article::find($id);
        //Si le client n'a pas encore des articles . Supprimer le client
        if($article->id_client != 0){
            $countart=article::where('id_client','=',$article->id_client)->count();
            if($countart == 1){
                $client=client::find($article->id_client);
                $client->delete();
            }
        }
        //Fin
        $article->delete();
        return redirect('/articles')->with('flash_message_success',"L'article est supprimé avec succés");
    }

    public function GetArticleToUpdate($id){
        $dec=Crypt::decryptString($id);
        $article=article::find($dec);
        return view('dashboard.articles.ModifierArticle')->with(array('article'=>$article,));
    }


    public function UpdateArticle(Request $request, $id){
        $data=$request->all();
        $dec=Crypt::decryptString($id);
        $article=article::find($dec);
        $article->nom=$data['nom'];
        $article->lieu=$data['lieu'];
        $article->superficie=$data['superficie'];
        $article->prix=$data['prix'];
        $article->date=$data['date'];
        $article->type=$data['type'];
        $article->objectif=$data['objectif'];
        if($data['objectif']=="Location"){
            $article->louerpar=$data['louerpar'];
        }else{
            $article->louerpar="";
        }
        $article->titre=$data['titre'];
        $ref=app('App\Http\Controllers\ClientController')->GenerateRef($data['objectif'],$data['type']);
        $article->ref=$ref.strval($id);
        /*****Resize and add image */
        if( $request->hasFile('image')){
            $image_tmp=Input::file('image');
            if($image_tmp->isValid()){
                $extension =$image_tmp->getClientOriginalExtension();
                
                $filename=rand(111,999).'.'.$extension;
                $large_image_path='img/l/'.$filename;
                $medium_image_path='img/m/'.$filename;
                $small_image_path='img/s/'.$filename;
                //Resize Images
                Image::make($image_tmp)->resize(1000,1200)->save($large_image_path);
                Image::make($image_tmp)->resize(500,333)->save($medium_image_path);
                Image::make($image_tmp)->resize(70,84)->save($small_image_path);
            }

            //Delete old image from folder
            if (file_exists($large_image_path.$article->image)) {
                unlink($large_image_path.$article->image);
            }

            if (file_exists($medium_image_path.$article->image)) {
                unlink($medium_image_path.$article->image);
            }

            if (file_exists($small_image_path.$article->image)) {
                unlink($small_image_path.$article->image);
            }

            $article->image=$filename;
        }
        /*** end image */
        $article->description=$data['description'];
        $article->update();

        return redirect('/articles')->with('flash_message_success',"L'article est bien modifié");
        
    }




    
   

    //Ajouter des images a l'article
    public function GetElementAddImage($id){
        $dec=Crypt::decryptString($id);
        $article=article::find($dec);
        $images=images::where('id_article','=',$id)->get();
        return view('dashboard.articles.ajouterimage')->with(compact('article','images'));
    }

    public function AddImageForArticle(Request $request , $id){
        $dec=Crypt::decryptString($id);
        if($files = $request->file('image')){
            foreach($files as $file){
                $image=new images();
                $image->id_article=$dec;
                /*****Resize and add image */
                        if($file->isValid()){
                        $extension =$file->getClientOriginalExtension();
                        
                        $filename=rand(111,999).'.'.$extension;
                        $large_image_path='img/l/'.$filename;
                        $medium_image_path='img/m/'.$filename;
                        $small_image_path='img/s/'.$filename;
                        //Resize Images
                        Image::make($file)->resize(1000,1200)->save($large_image_path);
                        Image::make($file)->resize(500,333)->save($medium_image_path);
                        Image::make($file)->resize(70,84)->save($small_image_path);

                        }

                        $image->image=$filename;
                    
                /*** end image */
                $image->save();
            }
        }
        return redirect('/articles')->with('flash_message_success',"Les images sont ajouté avec succés");
    }
    //Supprimer image article (les images secondaires)

    public function DeleteImage(Request $request){
        $id=$request->get('id');
        $img=images::find($id);
        $img->delete();
        return back()->with('flash_message_success',"L'image supprimé avec succés");
    }



    //Recherche générale dashboard
    public function SearchArticle(Request $request){
        $clef=$request->get('clef');
        $location=article::where('ref','=',$clef)->orderBy('id','DESC')->paginate(12);
        $vente=article::where('ref','=',$clef)->orderBy('id','DESC')->paginate(12);
        if(sizeof($location)==0 && sizeof($vente)==0){
            $location=article::where('nom','like','%'.$clef.'%')->orderBy('id','DESC')->paginate(12);
            $vente=article::where('nom','like','%'.$clef.'%')->orderBy('id','DESC')->paginate(12);
        }
        $client=client::all();
        return view('dashboard.articles.article')->with(compact('location','vente','client'));
    }
}
