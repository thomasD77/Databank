@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/buttons.bootstrap5.min.css') }}">
@endsection

@section('js_after')
    <!-- jQuery (required for DataTables plugin) -->
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.colVis.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
    @livewireStyles
@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Clients
                    </h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">DataTable</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a href="">Clients</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Dynamic Table Full -->
        <div class="block block-rounded row">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <!-- Search Form (visible on larger screens) -->
                    <form class="d-none d-md-inline-block" action="{{action('App\Http\Controllers\AdminClientController@search_client')}}" method="POST">
                        @csrf
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-alt" placeholder="Search.." id="page-header-search-input2" name="searchbar">
                            <button type="submit" class="input-group-text border-0">
                                <i class="fa fa-fw fa-search"></i>
                            </button>
                        </div>
                    </form>
                    <!-- END Search Form -->
                </h3>
                <a href="{{route('clients.create')}}"><button data-bs-toggle="tooltip" title="New Client" class="btn btn-alt-primary"><i class="fa fa-plus"></i></button></a>
                <a href="{{route('clients.archive')}}">
                    <button class="btn btn-secondary rounded mx-2" data-bs-toggle="tooltip" title="Archive">
                        <i class="fa fa-archive "></i>
                    </button>
                </a>
            </div>
            <div class="block-content block-content-full overflow-scroll">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <div>
                    <table class="table table-striped table-hover table-vcenter fs-sm">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">name</th>
                            <th scope="col">email</th>
                            <th scope="col">url</th>
                            <th scope="col">Registered</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($clients)
                            @foreach($clients as $client)
                                <tr>
                                    <td>{{$client->id ? $client->id : 'No ID'}}</td>
                                    <td><a href="{{ route('clients.show', $client->id) }}"><strong>{{$client->name ? $client->name : 'No name'}}</strong></a></td>
                                    <td>{{$client->email ? $client->email : 'No email'}}</td>
                                    <td>{{$client->billing ? $client->billing->website : 'No website'}}</td>
                                    <td>{{$client->created_at ? $client->created_at->diffForHumans() : 'Not Verified'}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{route('clients.edit', $client->id)}}">
                                                <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit client">
                                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                                </button>
                                            </a>
                                            <a href="{{route('clients.show', $client->id)}}">
                                                <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Show client">
                                                    <i class="far fa-eye"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    {!! $clients->links()  !!}
                </div>

            </div>
        </div>
        <!-- END Dynamic Table Full -->

        @livewireScripts
    </div>
    <!-- END Page Content -->
@endsection



