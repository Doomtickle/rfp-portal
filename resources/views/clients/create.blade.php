@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create a new client</h1>
        <hr>
        <form method="POST" action="/clients">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @include('clients.form')
        </form>
    </div>
@endsection
