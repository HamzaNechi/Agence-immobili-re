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

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
	
	<div class="ms-auto">

            <!--LEs client-->
            <div class="btn-group">
							<button type="button" class="btn btn-warning">Client</button>
							<button type="button" class="btn btn-warning split-bg-warning dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                @if(sizeof($client) > 0)	
                  @foreach($client as $cl)
                  <a class="dropdown-item" href="{{ url('/article_client',Crypt::encryptString($cl->id)) }}">{{ $cl->nom }}</a>
                  @endforeach
                @else
                <a class="dropdown-item" href="#">Aucun client</a>
                @endif
							</div>
						</div>
          <!--end client-->
          &nbsp
    <!--trier par-->
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Trier par</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	
                <a class="dropdown-item" href="{{ url('/trierpar/superficie') }}">Superficie</a>
								<a class="dropdown-item" href="{{ url('/trierpar/prix') }}">Prix</a>
								<a class="dropdown-item" href="{{ url('/trierpar/actif') }}">Actifs</a>
								<a class="dropdown-item" href="{{ url('/trierpar/attente') }}">En attente</a>
							</div>
						</div>
    <!--end trier par-->

          
	</div>
</div>

					<div class="col">
						
						<div class="card">
							<div class="card-body">
								<ul class="nav nav-tabs nav-primary" role="tablist">
                  @if(sizeof($vente) > 0)
									<li class="nav-item" role="presentation">
										<a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class='bx bx-log-out-circle font-18 me-1'></i>
												</div>
												<div class="tab-title">Vente</div>
											</div>
										</a>
									</li>
                  @endif

                  @if(sizeof($location) > 0)
									<li class="nav-item" role="presentation">
                  @if(sizeof($vente) <= 0)
										<a class="nav-link active" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="true">
                  @else
                  <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false">
                  @endif
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class='bx bx-recycle font-18 me-1'></i>
												</div>
												<div class="tab-title">Location</div>
											</div>
										</a>
									</li>
                  @endif
									
								</ul>



								<div class="tab-content py-3">
                  @if(sizeof($vente) > 0)
									<div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                    <!--veente-->
                    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-3 row-cols-xl-3">
                      @foreach($vente as $v)
                      <div class="col">
                        <div class="card">
                          <img src='{{URL::asset("img/m/$v->image")}}' class="card-img-top" alt="...">
                          <div class="">
                            <div class="position-absolute top-0 end-0 m-3">
                              @if($v->status == 1)
                              <a href="#exampleModal" id="ForStatus" data-bs-toggle="modal" data-id="{{ $v->id }}" data-bs-target="#exampleModal"><span class="badge bg-primary">Actif</span></a>
                              @else
                              <a href="#exampleModal" id="ForStatus" data-bs-toggle="modal" data-id="{{ $v->id }}" data-bs-target="#exampleModal"><span class="badge bg-warning">En attente</span></a>
                              @endif
                            </div>
                          </div>
                          <div class="card-body">
                            <h5 class="card-title">{{ $v->nom }}</h5>
                            
                          </div>
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item">Réfférence : {{ $v->ref }}</li>
                            <li class="list-group-item">Prix : {{ $v->prix }}DT</li>
                            <li class="list-group-item">Superficie : {{ $v->superficie}} m²</li>
                            <li class="list-group-item">Emplacement : {{ $v->lieu}}</li>
                            <li class="list-group-item">
                              <div class="chat-tab-menu mt-3">
                                <ul class="nav nav-pills nav-justified">
                                  <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/detail',Crypt::encryptString($v->id)) }}">
                                      <div class="font-24"><i class='bx bx-zoom-in'></i>
                                      </div>
                                      
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/ModifierArticle',Crypt::encryptString($v->id)) }}">
                                      <div class="font-24"><i class='bx bx-pencil'></i>
                                      </div>
                                      
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/ajouterimage',Crypt::encryptString($v->id)) }}">
                                      <div class="font-24"><i class='bx bx-image-add'></i>
                                      </div>
                                      
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="modal" href="#exampleDangerModal" id="ForDelete" data-id="{{ $v->id }}" data-bs-target="#exampleDangerModal">
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
                    {{ $vente->links('vendor.pagination.back-paginator') }}
                    <!--end vente-->
									</div>
                  @endif

                  @if(sizeof($location) > 0)
                  @if(sizeof($vente) <= 0)
									<div class="tab-pane fade show active" id="primaryprofile" role="tabpanel">
                  @else
                  <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                  @endif
										<!--Location-->
                    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-3 row-cols-xl-3">
                      @foreach($location as $l)
                      <div class="col">
                        <div class="card">
                          <img src='{{URL::asset("img/m/$l->image")}}' class="card-img-top" alt="...">
                          <div class="">
                            <div class="position-absolute top-0 end-0 m-3">
                              @if($l->status == 1)
                              <a href="#exampleModal" id="ForStatus" data-bs-toggle="modal" data-id="{{ $l->id }}" data-bs-target="#exampleModal"><span class="badge bg-primary">Actif</span></a>
                              @else
                              <a href="#exampleModal" id="ForStatus" data-bs-toggle="modal" data-id="{{ $l->id }}" data-bs-target="#exampleModal"><span class="badge bg-warning">En attente</span></a>
                              @endif
                            </div>
                          </div>
                          <div class="card-body">
                            <h5 class="card-title">{{ $l->nom }}</h5>
                            
                          </div>
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item">Réfférence : {{ $l->ref }}</li>
                            <li class="list-group-item">Prix : {{ $l->prix }}DT/{{ $l->louerpar }}</li>
                            <li class="list-group-item">Superficie : {{ $l->superficie}} m²</li>
                            <li class="list-group-item">Emplacement : {{ $l->lieu}}</li>
                            <li class="list-group-item">
                              <div class="chat-tab-menu mt-3">
                                <ul class="nav nav-pills nav-justified">
                                  <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/detail',Crypt::encryptString($l->id)) }}">
                                      <div class="font-24"><i class='bx bx-zoom-in'></i>
                                      </div>
                                      
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/ModifierArticle',Crypt::encryptString($l->id)) }}">
                                      <div class="font-24"><i class='bx bx-pencil'></i>
                                      </div>
                                      
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/ajouterimage',Crypt::encryptString($l->id)) }}">
                                      <div class="font-24"><i class='bx bx-image-add'></i>
                                      </div>
                                      
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                  <a class="nav-link" data-bs-toggle="modal" href="#exampleDangerModal" id="ForDelete" data-id="{{ $l->id }}" data-bs-target="#exampleDangerModal">
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
                    {{ $location->links('vendor.pagination.back-paginator') }}
                    <!--end Location-->
									</div>
                  @endif
									
								</div>
							</div>
						</div>
					</div>
					
<!--modal for status-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Modifier status</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">Si le status de l'article est active alors l'article est affiché dans la vitrine.<br><br>
                            <form method="GET" action="{{ url('/modifierstatus') }}">
                              
                                <select name="stat" class="form-select">
                                  <option value="1">Activer</option>
                                  <option value="0">En attente</option>
                                </select>

                                <input type="hidden" id="stat" name="id" value="">
                              
                          </div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
														<button type="submit" class="btn btn-danger">Modifier</button>
                            </form>
													</div>
												</div>
											</div>
										</div>
<!--end modal-->

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
				<!--end supprimer vente-->

				


        
<script>
$(document).on("click", "#ForDelete", function () {
     var id = $(this).data('id');
     $(".modal-body #id").val( id );
});

$(document).on("click", "#ForStatus", function () {
     var id = $(this).data('id');
     $(".modal-body #stat").val( id );
});

</script>

				
				
				
				
				
				
			
		
		
	
	

@endsection