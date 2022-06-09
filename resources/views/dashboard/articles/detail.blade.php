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

				 <div class="card">
                            <div class="card-body">
								<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
									<div class="carousel-inner">
										<div class="carousel-item active">
											<img src='{{URL::asset("img/l/$article->image")}}' class="d-block w-100" alt="...">
										</div>
                                        @foreach($images as $img)
										<div class="carousel-item">
											<img src='{{URL::asset("img/l/$img->image")}}' class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
												<button type="button" class="btn btn-dark px-5 radius-30" data-id="{{ $img->id }}" id="DeleteImage" data-bs-toggle="modal" data-bs-target="#ImageDangerModal">Supprimer l'image</button>
											</div>
										</div>
                                        @endforeach
										
									</div>
									<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Previous</span>
									</a>
									<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">	<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Next</span>
									</a>
								</div>
							</div>
                    <hr/>
					<div class="card-body">
						<ul class="nav nav-tabs nav-primary mb-0" role="tablist">
							<li class="nav-item" role="presentation">
								<a class="nav-link" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
									<div class="d-flex align-items-center">
										<div class="tab-icon"><i class='bx bx-comment-detail font-18 me-1'></i>
										</div>
										<div class="tab-title">Description </div>
									</div>
								</a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link active" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false">
									<div class="d-flex align-items-center">
										<div class="tab-icon"><i class='bx bx-bookmark-alt font-18 me-1'></i>
										</div>
										<div class="tab-title">Caractéristiques</div>
									</div>
								</a>
							</li>
							
						</ul>
						<div class="tab-content pt-3">
							<div class="tab-pane fade" id="primaryhome" role="tabpanel">
								<p><?php echo $article->description ; ?></p>
							</div>
							<div class="tab-pane fade show active" id="primaryprofile" role="tabpanel">
                                
                                    
                                        <ul class="list-group">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">Référence <span class="badge bg-primary rounded-pill">{{ $article->ref }}</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">Nom<span class="badge bg-primary rounded-pill">{{ $article->nom }}</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">Superficie<span class="badge bg-primary rounded-pill">{{ $article->superficie }} m²</span>
                                            </li>
                                            @if($article->objectif == "Vente")
                                            <li class="list-group-item d-flex justify-content-between align-items-center">Prix<span class="badge bg-primary rounded-pill">{{ $article->prix }} TND</span>
                                            </li>
                                            @else
                                            <li class="list-group-item d-flex justify-content-between align-items-center">Prix<span class="badge bg-primary rounded-pill">{{ $article->prix }} TND/{{ $article->louerpar }}</span>
                                            </li>
                                            @endif
                                            <li class="list-group-item d-flex justify-content-between align-items-center">Emplacement<span class="badge bg-primary rounded-pill">{{ $article->lieu }}</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">Objectif<span class="badge bg-primary rounded-pill">{{ $article->objectif }}</span>
                                            </li>
                                            @if($article->titre != NULL)
                                            <li class="list-group-item d-flex justify-content-between align-items-center">Titre<span class="badge bg-primary rounded-pill">{{ $article->titre }}</span>
                                            </li>
                                            @endif
                                            <li class="list-group-item d-flex justify-content-between align-items-center">Date<span class="badge bg-primary rounded-pill">{{ $article->date }}</span>
                                            </li>
                                        </ul>
                                    
                                    
                                        
                                    
                                
                                
							</div>
							
						</div>
					</div>

				  </div>


					<h6 class="text-uppercase mb-0">Articles Liés</h6>
					<hr/>
                     <div class="row row-cols-1 row-cols-lg-3">
                     @foreach($related as $r)
                      <div class="col">
                        <div class="card">
                          <img src='{{URL::asset("img/m/$r->image")}}' class="card-img-top" alt="...">
                          <div class="">
                            <div class="position-absolute top-0 end-0 m-3">
                              @if($r->status == 1)
                              <a href=""><span class="badge bg-primary">Actif</span></a>
                              @else
                              <a href=""><span class="badge bg-warning">En attente</span></a>
                              @endif
                            </div>
                          </div>
                          <div class="card-body">
                            <h5 class="card-title">{{ $r->nom }}</h5>
                            
                          </div>
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item">Réfférence : {{ $r->ref }}</li>
                            <li class="list-group-item">Prix : {{ $r->prix }}DT</li>
                            <li class="list-group-item">Superficie : {{ $r->superficie}} m²</li>
                            <li class="list-group-item">Emplacement : {{ $r->lieu}}</li>
                            <li class="list-group-item">
                              <div class="chat-tab-menu mt-3">
                                <ul class="nav nav-pills nav-justified">
                                  <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/detail',$r->id) }}">
                                      <div class="font-24"><i class='bx bx-zoom-in'></i>
                                      </div>
                                      
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/ModifierArticle',$r->id) }}">
                                      <div class="font-24"><i class='bx bx-pencil'></i>
                                      </div>
                                      
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/ajouterimage',$r->id) }}">
                                      <div class="font-24"><i class='bx bx-image-add'></i>
                                      </div>
                                      
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="modal" href="#exampleDangerModal" id="ForDelete" data-id="{{ $r->id }}" data-bs-target="#exampleDangerModal">
                                      <div class="font-24"><i class='bx bx-trash'></i>
                                      </div>
                                      
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                          </ul>
                          
                        </div>
                      </div>
                      @endforeach
					   </div>


<!-- Modal -->
<div class="modal fade" id="exampleDangerModal" tabindex="-1" aria-hidden="true">
											<div class="modal-dialog modal-lg modal-dialog-centered">
												<div class="modal-content bg-danger">
													<div class="modal-header">
														<h5 class="modal-title text-white">Supprimer annonce</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body text-white">
                          <form method="GET" action="{{ url('/SupprimerArticle')}}">
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
				<!--end row-->



        <!-- Modal -->
<div class="modal fade" id="ImageDangerModal" tabindex="-1" aria-hidden="true">
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
                                <input type="hidden" name="id" id="idimage" value="">
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
														<button type="submit" class="btn btn-dark">Supprimer</button>
                          </form>
													</div>
												</div>
											</div>
										</div>
				<!--end row-->


<script>
$(document).on("click", "#ForDelete", function () {
     var id = $(this).data('id');
     console.log(id);
     $(".modal-body #id").val( id );
});


$(document).on("click", "#DeleteImage", function () {
     var id = $(this).data('id');
     $(".modal-body #idimage").val( id );
});

</script>
@endsection