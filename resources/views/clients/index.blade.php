@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('partials.sidebar')
        <div class="col-sm-9 col-md-10 main">
            <h1 class="page-header">Clients</h1>
            <a style="margin-bottom:30px;" class="btn btn-primary" href="/clients/create">Add a client</a>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Client ID</th>
                        <th>Client name</th>
                        <th>Client Industry</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->id }}</td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->industry }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
