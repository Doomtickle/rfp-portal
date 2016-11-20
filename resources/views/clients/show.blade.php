@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('partials.sidebar')
            <div class="col-md-10">
                <span style="display:inline-block;"><h1>{{ $client->name }}</h1></span>
                <span style="display:inline-block;"><h2> &gt; {{ $client->industry }}</h2></span>
                <hr>
                @include('clients.addClientContact')
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Title</th>
                            <th>Email</th>
                            <th>Telephone</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($client->clientContacts as $contact)
                            <tr>
                                <td>{{ $contact->first_name }}</td>
                                <td>{{ $contact->last_name }}</td>
                                <td>{{ $contact->title }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection