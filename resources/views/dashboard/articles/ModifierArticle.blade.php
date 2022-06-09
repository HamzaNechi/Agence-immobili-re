@extends('layouts.app1')
@section('content')
<div class="row">
					<div class="col-xl-7 mx-auto mb-3">
						
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-message-square-edit me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Modifier annonce</h5>
								</div>
								<hr>
								<form class="row g-3" method="post" action="{{ url('/ModifierArticle',$article->id)}}" enctype="multipart/form-data">
									{{ csrf_field() }}
									<div class="col-md-6">
										<label for="inputFirstName" class="form-label">Nom</label>
										<input type="text" class="form-control" id="nom" name="nom" value="{{ $article->nom }}">
									</div>
									<div class="col-md-6">
										<label for="inputLastName" class="form-label">Superficie</label>
										<input type="text" class="form-control" id="superficie" name="superficie" value="{{ $article->superficie }}">
									</div>
									<div class="col-md-6">
										<label for="inputEmail" class="form-label">Prix</label>
										<input type="text" class="form-control" id="prix" name="prix" value="{{ $article->prix }}">
									</div>
									<div class="col-md-6">
										<label for="inputPassword" class="form-label">Titre</label>
										<input type="text" class="form-control" id="titre" name="titre" value="{{ $article->titre }}">
									</div>
									<?php
										$lieu=explode(",",$article->lieu);
										$ville=$lieu[0];
									?>
									<div class="col-md-6">
										<label for="inputState" class="form-label">Ville</label>
										<select id="region" class="form-select">
											<option selected="selected">{{ $ville }}</option>
											<option>Nabeul</option>
											<option>Hammamet</option>
											<option>Korba</option>
											<option>Klibya</option>
										</select>
									</div>

									<div class="col-md-6">
										<label for="inputCity" class="form-label">Emplacement</label>
										<input type="text" class="form-control" id="adresse" name="lieu" value="{{ $article->lieu }}">
									</div>

									<div class="col-md-6">
										<label for="inputState" class="form-label">Objectif</label>
										<select name="objectif" id="obj" class="form-select">
											@if($article->objectif == "Location")
											<option value="Location" selected>Location</option>
											<option value="Vente">Vente</option>
											@else
											<option value="Location">Location</option>
											<option value="Vente" selected>Vente</option>
											@endif
										</select>
									</div>

									@if($article->objectif == "Location")
									<div class="col-md-6" id="locpar">
										<label for="inputState" class="form-label">Location par</label>
										<select name="louerpar" class="form-select">
											<option value="{{ $article->louerpar }}">{{ $article->louerpar }}</option>
											<option value="Nuit">Nuit</option>
											<option value="Année">Année</option>
											<option value="Mois">Mois</option>
											<option value="Semaine">Semaine</option>
										</select>
									</div>
									@else
									<div class="col-md-6" style="display:none;" id="locpar">
										<label for="inputState" class="form-label">Location par</label>
										<select name="louerpar" class="form-select">
											<option value="Nuit">Nuit</option>
											<option value="Année">Année</option>
											<option value="Mois">Mois</option>
											<option value="Semaine">Semaine</option>
										</select>
									</div>
									@endif

									<div class="col-md-6">
										<label for="inputState" class="form-label">Type</label>
										<select name="type" id="type" class="form-select">
											<option value="{{ $article->type }}">{{ $article->type }}</option>
											<option value="Maison">Maison</option>
											<option value="Terrain titre bleu">Terrain titre bleu</option>
											<option value="Terrain agricole">Terrain agricole</option>
											<option value="Locaux commerciales">Locaux commerciales</option>
										</select>
									</div>

									
									
									

									<div class="col-md-6">
										<label for="inputCity" class="form-label">Date</label>
										<input type="date" class="form-control" name="date" value="{{ $article->date }}">
									</div>

									<div class="col-md-12">
										<label class="form-label">Image</label>
										<div class="input-group">
											<input type="file" name="image" value="{{ $article->image }}" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
											
										</div>
									</div>

									<!-- <div class="col-12">
										<label for="inputAddress" class="form-label">Description</label>
										<textarea class="form-control" name="description" placeholder="Description..." rows="3">{{ $article->description }}</textarea>
									</div> -->

									<!--editor-->
									<div class="form-group col-12">
										<label>Description</label>
										<textarea id="editor" name="description" rows="3">{{ $article->description }}</textarea>
									</div>
									<!--end editor-->

									
									
									
									
									<div class="col-12">
										<button type="submit" class="btn btn-primary px-5">Modifier</button>
									</div>
								</form>
							</div>
						</div>
						
					</div>
				</div>
				
				<script>
	$("#region").change(function(){
		reg=$("#region").val();
		$("#adresse").val(reg+",");
	});

	$("#obj").change(function(){
		if($("#obj").val()=="Location"){
			$("#locpar").show();
		}else{
			$("#locpar").hide();
		}
	});
</script>
@endsection