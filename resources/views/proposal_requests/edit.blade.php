@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('partials.sidebar')
            <div class="col-md-10">
                <h1>Edit the Proposal Request</h1>
                <hr>
                @include('partials.edit_pr_form')
            </div>
        </div>
    </div>
@stop