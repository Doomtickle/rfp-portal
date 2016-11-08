@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8"><h1>{{$rfp->clientName}}</h1>
                <h2>{{$rfp->campaignName}}</h2>
                <hr>
                <ul>
                    <li>Industry: {{ $rfp->clientIndustry }}</li>
                    <li>Basic Description: {{ $rfp->basicDescription }}</li>
                    <li>Flight Date start: {{ $rfp->flightDateStart }}</li>
                    <li>Flight Date end: {{ $rfp->flightDateEnd }}</li>
                    <li>Budget: {{ $rfp->budget }}</li>
                </ul>
            </div>
            <div class="col-md-4">
                @foreach ($rfp->proposals as $proposal)
                    <a target="_blank" href="/{{$proposal->path}}">{{$proposal->path}}</a>
                @endforeach
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <h2>Upload your proposal</h2>
        <form id="addProposalsForm" action="/{{ $rfp->clientName }}/{{ $rfp->campaignName }}/proposals"
              method="POST"
              class="dropzone"
              enctype="multipart/form-data"
              style="margin-bottom:50px;">
            {{ csrf_field() }}
        </form>
    </div>
@endsection

@section('scripts.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
    <script>

        Dropzone.options.addProposalsForm = {

          paramName: 'proposal',
          maxFilesize: 3,
          acceptedFiles: '.docx, .pdf, .xlsx, .xls, .csv'

        };
    </script>
@endsection