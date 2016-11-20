@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $client->name }}</h1>
        <h2>{{ $client->industry }}</h2>
        <hr>
        <div class="container">
            <a class="btn btn-primary" style="margin-bottom:30px;" role="button" data-toggle="collapse" href="#addContact" aria-expanded="false" aria-controls="addContact">
                New Contact
            </a>
            <div class="collapse" id="addContact">
                <div class="well">
                    <form id="addContactForm" action="/client_list/{{ $client->name }}/contacts"
                          method="POST"
                          style="margin-bottom:50px;">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="title">Job Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-7">
                                <label for="email">Email Address</label>
                                <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="phone">Phone Number</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add contact</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
@endsection