@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Create a new proposal request</h1>
        <hr>
        <form method="POST" action="/proposal_requests">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @include('proposal_requests.form')
        </form>
    </div>
@stop