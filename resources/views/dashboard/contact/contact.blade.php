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


<div class="card radius-10">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <div>
                <h6 class="mb-0">Tous les messages</h6>
            </div>
            <div class="dropdown ms-auto">
                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i
                        class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="javascript:;"
                            onclick="document.getElementById('ForDeleteAll').submit()" ;>Supprimer</a>
                    </li>
                    <li><a class="dropdown-item" href="{{ url('/supprimer_tous_les_messages') }}">Supprimer tous</a>
                    </li>
                    <!-- <li>
											<hr class="dropdown-divider">
										</li>
										<li><a class="dropdown-item" href="javascript:;">Something else here</a>
										</li> -->
                </ul>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th></th>
                        <th>Nom</th>
                        <th>Référence annonce</th>
                        <th>Téléphone</th>
                        <th>Date</th>
                        <th>Message</th>

                    </tr>
                </thead>
                <tbody>
                    <form method="post" action="{{ url('/supprimer_contact') }}" id="ForDeleteAll">
                        {{csrf_field()}}
                        @foreach($contact as $c)
                        <tr>
                            <td>
                                <input type="checkbox" name="id[]" class="input-form" value="{{ $c->id }}">
                            </td>
                            <td>{{ $c->nom }}</td>
                            <td>
                                @if( $c->ref_article != "")
                                <a href="{{ url('/detail',$c->id_article) }}">#{{ $c->ref_article }}</a>
                                @else
                                <a href="#"><i class="bx bx-question-mark"></i></a>
                                @endif
                            </td>
                            <td>{{ $c->tel }}</td>
                            <td>{{ $c->created_at }}</td>
                            <td><textarea rows="3" cols="50" style="border:0;">{{ $c->message }}</textarea></td>
                        </tr>
                        @endforeach
                    </form>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
