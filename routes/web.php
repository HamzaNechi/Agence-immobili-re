<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/ajouterBiens', function () {
    return view('dashboard.articles.ajouterbien');
});

Route::get('/annonces', function () {
    return view('vitrine.annonces');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route profile
Route::get('/admin',function(){
    return view('dashboard.profile');
});
Route::get('/Changer_mot_de_passe','HomeController@updatepassword');



//Route article
Route::post('/ajouterBiens','ArticleController@addarticle');
Route::get('/articles','ArticleController@index');
Route::get('/SupprimerArticle','ArticleController@destroy');
Route::get('/ModifierArticle/{id}','ArticleController@GetArticleToUpdate');
Route::post('/ModifierArticle/{id}','ArticleController@UpdateArticle');
Route::get('/detail/{id}','ArticleController@voirdetail');
Route::get('/trierpar/{clef}','ArticleController@trierarticlepar');
Route::get('/modifierstatus','ArticleController@modifierStatus');
Route::get('/admin/chercherannonce','ArticleController@SearchArticle');

//Route image article
Route::get('/ajouterimage/{id}','ArticleController@GetElementAddImage');
Route::post('/ajouterimage/{id}','ArticleController@AddImageForArticle');
Route::get('/SupprimerImage','ArticleController@DeleteImage');


//Route page d'acceuil (vitrine)
Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
	Route::get('/','IndexController@index')->name('/');
    Route::get('/chercherbien','IndexController@SearchHome');
});



//Route page annonces
Route::get('/annonces','IndexController@getannonces');
Route::get('/chercherrbien','IndexController@SearchAnnonces');
Route::get('/trierannonces','IndexController@Sort');
Route::get('/chercherrapidement','IndexController@Rechercherapide');

//Route page détail article
Route::get('/détail/{id}','IndexController@voirdetail');

//Route contact client
Route::post('/ajouter_contact','ContactController@AjouterContact');
Route::get('/contact','ContactController@index');
Route::get('/supprimer_tous_les_messages','ContactController@DeleteAll');
Route::post('/supprimer_contact','ContactController@DeleteSelected');


//Route annonces client (vitrine)
Route::get('/ajouter_annonces',function(){
    return view('vitrine.ajouterannonce');
});
Route::post('/ajouter_annonces','ClientController@AjouterArticleClient');

//Route annonces client (dashboard)
Route::get('/article_client/{id}','ClientController@AffcherArticleClient');
Route::get('/client','ClientController@index');
Route::get('/supprimerclient','ClientController@supprimerclient');
Route::get('/client/supprimer','ClientController@SupprimerTousSelectionnez');