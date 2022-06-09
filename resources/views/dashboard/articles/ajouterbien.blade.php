@extends('layouts.app1')
@section('content')
<div class="row">
					<div class="col-xl-7 mx-auto mb-3">
						
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-message-square-add me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Ajouter annonce</h5>
								</div>
								<hr>
								<form class="row g-3" method="post" action="{{ url('/ajouterBiens')}}" enctype="multipart/form-data">
									{{ csrf_field() }}
									<div class="col-md-6">
										<label for="inputFirstName" class="form-label">Nom</label>
										<input type="text" class="form-control" id="nom" name="nom">
									</div>
									<div class="col-md-6">
										<label for="inputLastName" class="form-label">Superficie</label>
										<input type="text" class="form-control" id="superficie" name="superficie">
									</div>
									<div class="col-md-6">
										<label for="inputEmail" class="form-label">Prix</label>
										<input type="text" class="form-control" id="prix" name="prix">
									</div>
									<div class="col-md-6">
										<label for="inputPassword" class="form-label">Titre</label>
										<input type="text" class="form-control" id="titre" name="titre">
									</div>

									<div class="col-md-6">
										<label for="inputState" class="form-label">Ville</label>
										<select id="region" class="form-select">
											<option selected>Nabeul</option>
											<option>Hammamet</option>
											<option>Korba</option>
											<option>Klibya</option>
										</select>
									</div>

									<div class="col-md-6">
										<label for="inputCity" class="form-label">Emplacement</label>
										<input type="text" value="Nabeul," class="form-control" id="adresse" name="lieu">
									</div>

									<div class="col-md-6">
										<label for="inputState" class="form-label">Objectif</label>
										<select name="objectif" id="obj" class="form-select">
											<option selected>Séléctionnez un objectif</option>
											<option value="Location">Location</option>
											<option value="Vente">Vente</option>
										</select>
									</div>


									<div class="col-md-6" style="display:none;" id="locpar">
										<label for="inputState" class="form-label">Location par</label>
										<select name="louerpar" class="form-select">
											<option value="Nuit">Nuit</option>
											<option value="Année">Année</option>
											<option value="Mois">Mois</option>
											<option value="Semaine">Semaine</option>
										</select>
									</div>

									<div class="col-md-6">
										<label for="inputState" class="form-label">Type</label>
										<select name="type" id="type" class="form-select">
											<option selected >Sélectionnez le type du bien</option>
											<option value="Maison">Maison</option>
											<option value="Terrain titre bleu">Terrain titre bleu</option>
											<option value="Terrain agricole">Terrain agricole</option>
											<option value="Locaux commerciales">Locaux commerciales</option>
										</select>
									</div>

									
									
									<div class="col-md-6">
										<label for="inputCity" class="form-label">Référence</label>
										<input type="text" class="form-control" name="ref" id="ref">
									</div>

									<div class="col-md-6">
										<label for="inputCity" class="form-label">Date</label>
										<input type="date" class="form-control" name="date">
									</div>

									<div class="col-md-12">
										<label class="form-label">Image</label>
										<div class="input-group">
											<input type="file" name="image" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
											
										</div>
									</div>

									<!-- <div class="col-12">
										<label for="inputAddress" class="form-label">Description</label>
										<textarea class="form-control" name="description" placeholder="Description..." rows="3"></textarea>
									</div> -->

									<!--editor-->
									<div class="form-group col-12">
										<label>Description</label>
										<textarea id="editor" name="description" rows="3"></textarea>
									</div>
									<!--end editor-->
									
									
									<div class="col-12">
										<button type="submit" class="btn btn-primary px-5">Ajouter</button>
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
			s="L";
		}else{
			$("#locpar").hide();
			s="V";
		}
		$("#ref").val(s);
	});

	$("#type").change(function(){
		p="";

		if($("#ref").val()==""){
			alert("Séléctionnez votre objectif avant de choisir le type");
			return;
		}
		if($("#type").val()=="Terrain titre bleu"){
			p="TB";
		}

		if($("#type").val()=="Terrain agricole"){
			p="TA";
		}

		if($("#type").val()=="Maison"){
			p="M";
		}

		if($("#type").val()=="Locaux commerciales"){
			p="LC";
		}
		nouvelle=$("#ref").val()+p;
		console.log(nouvelle);
		$("#ref").val(nouvelle);
	});
</script>
@endsection