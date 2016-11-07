@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$rfp->clientName}}</h1>
        <h2>{{$rfp->campaignName}}</h2>
        <hr>
        <ul>
            <li>Industry: {{ $rfp->clientIndustry }}</li>
            <li>Basic Description: {{ $rfp->basicDescription }}</li>
            <li>Flight Date start: {{ $rfp->flightDateStart }}</li>
            <li>Flight Date end: {{ $rfp->flightDateEnd }}</li>
            <li>Budget: ${{ $rfp->budget }}</li>
        </ul>
@endsection