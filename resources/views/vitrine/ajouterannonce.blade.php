@extends('layouts.app2')
@section('content')

<!--Add Property Section-->
<section class="add-property">
    	<div class="default-form">
            <form method="post" action="{{ url('/ajouter_annonces')}}" enctype="multipart/form-data">
            {{ csrf_field()}}
                <!--Add Property Info-->
                <div class="add-property-info">
                    <div class="auto-container">
                        <div class="sec-title centered"><h2>Annonce Info</h2></div>
                        <div class="row clearfix">
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="field-label">Nom de l'annonce</div>
                                <input type="text" name="nom" value="" placeholder="" required>
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <div class="field-label">Superficie (m²)</div>
                                <input type="text" name="superficie" value="" placeholder="0" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <div class="field-label">Prix (TND)</div>
                                <input type="text" name="prix" value="" placeholder="0" required>
                            </div>

                            <!-- <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="field-label">Titre</div>
                                <input type="text" name="titre" value="" required>
                            </div> -->

                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <div class="field-label">Ville</div>
                                <select class="" name="région">
                                    <option selected>Nabeul</option>
									<option>Hammamet</option>
									<option>Korba</option>
									<option>Klibya</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <div class="field-label">Emplacement</div>
                                <input type="text" name="lieu" value="" required>
                            </div>


                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <div class="field-label">Objectif</div>
                                <select name="objectif" id="obj">
                                    <option>Location ou Vente</option>
                                    <option value="Location">Location</option>
                                    <option value="Vente">Vente</option>
                                </select>
                            </div>
                            

                            <div class="form-group col-md-6 col-sm-6 col-xs-12" style="display:none;" id="lp">
                                <div class="field-label">Louer par</div>
                                <select class="custom-select-box" name="louerpar">
                                    <option>Nuit</option>
                                    <option>Jour</option>
                                    <option>Semaine</option>
                                    <option>Mois</option>
                                    <option>Année</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <div class="field-label">Type</div>
                                <select class="" name="type">
                                    <option selected >Sélectionnez le type du bien</option>
									<option value="Maison">Maison</option>
									<option value="Terrain titre bleu" id="tb">Terrain titre bleu</option>
									<option value="Terrain agricole">Terrain agricole</option>
									<option value="Locaux commerciales">Locaux commerciales</option>
                                </select>
                            </div>

                            

                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="field-label">Description</div>
                                <textarea name="description" placeholder="" required></textarea>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!--Add Gallery-->
                <div class="add-gallery">
                    <div class="auto-container">
                        <div class="sec-title centered"><h2>Photos</h2></div>
                        <div class="upload-panel" id="photo">
                        	<div class="icon"><span class="fa fa-plus"></span></div>
                            <div class="text" id="textup">Cliquez ici ou déposez les fichiers à télécharger</div>
                        </div>

                        
                    </div>
                </div>

                <input type="file" id="photo2" name="image[]" style="display:none;" multiple="multiple">
                
                
                <!--Add Contact Info-->
                <div class="add-contact-info">
                    <div class="auto-container">
                        <div class="sec-title centered"><h2>Contact Info</h2></div>
                        <div class="row clearfix">
                            <div class="form-group col-md-4 col-sm-6 col-xs-12">
                                <div class="field-label">Nom</div>
                                <input type="text" name="nom_client" value="" placeholder="" required>
                            </div>
                            <div class="form-group col-md-4 col-sm-6 col-xs-12">
                                <div class="field-label">Email</div>
                                <input type="email" name="email" value="" placeholder="" required>
                            </div>
                            <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                <div class="field-label">Téléphone</div>
                                <input type="text" name="tel" value="" placeholder="" required>
                            </div>
                            
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="button-box"><button type="submit" class="theme-btn btn-style-one">Envoyer</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
<script>
    $('#photo').click(function(){
        $('#photo2').click();
    });

    $('#photo2').change(function(click){
        $('#textup').html(this.value);
    });

    $('#obj').change(function(){
        if($('#obj').val()=="Location"){
            $('#lp').show();
            $("#tb").hide();
        }

        if($('#obj').val()=="Vente"){
            $('#lp').hide();
            $("#tb").show();
        }
        
    });
</script>
@endsection