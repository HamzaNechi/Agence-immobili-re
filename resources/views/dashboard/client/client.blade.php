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
                <h6 class="mb-0">Tous les clients</h6>
            </div>
            <div class="dropdown ms-auto">
                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i
                        class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="javascript:;"
                            onclick="document.getElementById('ForDeleteAll').submit()" ;>Supprimer</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th></th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Actions</th>


                    </tr>
                </thead>
                <tbody>
                    <form method="get" action="{{ url('/client/supprimer') }}" id="ForDeleteAll">
                        {{csrf_field()}}
                        @foreach($client as $c)
                        <tr>
                            <td>
                                <input type="checkbox" name="id[]" class="input-form" value="{{ $c->id }}">
                            </td>
                            <td>{{ $c->nom }}</td>
                            <td>
                                {{ $c->email }}
                            </td>
                            <td>{{ $c->tel }}</td>
                            <td>
                                <a href="{{ url('/article_client',Crypt::encryptString($c->id)) }}">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Annonces de {{ $c->nom }}"><i
                                            class='bx bx-customize me-0'></i>
                                    </button></a>
                                <span data-bs-toggle="modal" id="ForDelete" data-id="{{ $c->id }}"
                                    data-bs-target="#exampleDangerModal">
                                    <button type="button" class="btn btn-danger" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Supprimer {{ $c->nom }}"><i
                                            class='bx bx-trash me-0'></i>
                                    </button>
                                </span>
                            </td>

                        </tr>
                        @endforeach
                    </form>

                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleDangerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h5 class="modal-title text-white">Supprimer client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-white">
                <form method="GET" action="{{ url('/supprimerclient') }}">
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
<script>
    $(document).on("click", "#ForDelete", function () {
        var id = $(this).data('id');
        $(".modal-body #id").val(id);
        console.log(id);
    });

</script>


@endsection
