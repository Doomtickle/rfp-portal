@extends('layouts.app')

@section('content')

    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-8 col-md-offset-2">--}}
    {{--<div class="panel panel-default">--}}
    {{--<div class="panel-heading">Dashboard</div>--}}

    {{--<div class="panel-body">--}}
    {{--<p>This will be a dashboard. For now, we'll just have this button.</p>--}}
    {{--<a class="btn btn-primary" href="/proposal_requests/create">Create RFP &gt;</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Reports</a></li>
                    <li><a href="#">Analytics</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-md-10 main">
                <h1 class="page-header">Dashboard</h1>
                <h2 class="sub-header">Proposal Requests</h2>
                <a style="margin-bottom:30px;" class="btn btn-primary" href="/proposal_requests/create">Create RFP</a>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>RFP ID</th>
                            <th>Company Name</th>
                            <th>Campaign Name</th>
                            <th>Submitted on</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{ $prs = App\ProposalRequest::paginate(15) }}
                        @foreach($prs as $pr)
                            <tr>
                                <td>{{ $pr->id }}</td>
                                <td>{{ $pr->clientName }}</td>
                                <td>{{ $pr->campaignName }}</td>
                                <td>{{ date_format($pr->created_at, 'M d, Y') }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{$pr->clientName.'/'.
                                        $pr->campaignName }}">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $prs->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
