@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Create a new proposal request</h1>
        <hr>
        <form method="POST" action="/proposal_requests">
            @include('proposal_requests.form')
        </form>
    </div>
@stop