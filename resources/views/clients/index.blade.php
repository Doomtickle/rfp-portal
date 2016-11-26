@extends('adminlte::layouts.app')
@section('main-content')
    <div class="container-fluid">

        <div class="col-sm-9 col-md-10 main">
            <h1 class="page-header">Clients</h1>
            <a style="margin-bottom:30px;" class="btn btn-primary" href="/clients/create">Add a client</a>
            @include('partials.client_index_table')
        </div>
    </div>
@endsection
