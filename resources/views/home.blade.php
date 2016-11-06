@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                   <p>This will be a dashboard. For now, we'll just have this button.</p>
                    <a class="btn btn-primary" href="/proposal_requests/create">Create RFP &gt;</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
