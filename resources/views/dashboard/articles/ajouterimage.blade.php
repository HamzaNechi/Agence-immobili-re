@extends('layouts.app1')
@section('content')

@if(Session::has('flash_message_success'))
<div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="font-35 text-success"><i class='bx bxs-check-circle'></i>
        </div>
        <div class="ms-3">
            <h6 class="mb-0 text-success">Notification</h6>
            <div>{!! session('flash_message_success') !!}</div>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col">
					<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-image-add me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Ajouter image</h5>
								</div>
								<hr>
								<form class="row g-3" method="post" action="{{ url('/ajouterimage',Crypt::encryptString($article->id))}}" enctype="multipart/form-data">
									{{ csrf_field() }}
									<br><br>
										<div class="form-group">
												<label class="form-label">Nom</label>
												
													
													<input type="text" class="form-control" value="{{ $article->nom }}" name="nom" disabled>
												
										</div>
									<br><br>
										<div class="col-md-12">
											<label class="form-label">Image</label>
											<div class="input-group">
												<input type="file" name="image[]" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" multiple>
												
											</div>
										</div>
									<br><br><br>	
										
									<div class="col-12">
										<button type="submit" class="btn btn-primary px-5">Ajouter</button>
									</div>
								</form>
								<br><br>
							</div>
</div>
					</div>
					<div class="col">
						<div class="card">
							<div class="card-body">
								<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
									<div class="carousel-inner">
										<div class="carousel-item active">
											<img src='{{ URL::asset("img/m/$article->image")}}' class="d-block w-100" alt="...">
										</div>
										@if($images != NULL)
										@foreach($images as $image)
										<div class="carousel-item">
											
											<img src='{{ URL::asset("img/m/$image->image")}}' class="d-block w-100" alt="...">
											<div class="carousel-caption d-none d-md-block">
											<button type="button" id="ForDelete" class="btn btn-dark px-5 radius-30" data-bs-toggle="modal" data-id="{{ $image->id }}" data-bs-target="#exampleDangerModal"><i class='bx bx-trash mr-1'></i>Supprimer l'image</button>
											</div>
										</div>
										@endforeach
										@endif
										
									</div>
									<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Previous</span>
									</a>
									<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">	<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Next</span>
									</a>
								</div>
							</div>
						</div>
					</div>
</div>		
<!--end-->

<div class="modal fade" id="exampleDangerModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content bg-danger">
			<div class="modal-header">
				<h5 class="modal-title text-white">Supprimer l'image</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body text-white">
				<form method="GET" action="{{ url('/SupprimerImage')}}">
                {{ csrf_field() }}
                Êtes-vous sûr de vouloir supprimer ?
                <input type="hidden" name="id" id="id" value="">
						
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
				<button type="submit" class="btn btn-dark">Supprimer</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div id="number" style="display:none;">2</div>
<script>
$(document).on('click', '#add', function () {
	var x=parseInt($('#number').text());
		$('#number').text(x+1);
		$("#image"+x).show();
});

$(document).on("click", "#ForDelete", function () {
     var id = $(this).data('id');
     console.log(id);
     $(".modal-body #id").val( id );
});
</script>
@endsection