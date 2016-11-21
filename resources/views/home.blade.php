@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('partials.sidebar')
            <div class="col-sm-9 col-md-10 main">
                <h1 class="page-header">Dashboard</h1>
                <h2 class="sub-header">Proposal Requests</h2>
                @if (\Entrust::hasRole('admin'))
                    <p>This message can only be read by admins</p>
                @endif
                <a style="margin-bottom:30px;" class="btn btn-primary" href="/proposal_requests/create">Create RFP</a>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>RFP ID</th>
                            <th>Company Name</th>
                            <th>Campaign Name</th>
                            <th>Submitted on</th>
                            <th>Submitted by</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $prs=App\ProposalRequest::with('user')->paginate(5);
                        ?>
                        @foreach($prs as $pr)
                            <tr>
                                <td>{{ $pr->id }}</td>
                                <td>{{ $pr->clientName }}</td>
                                <td>{{ $pr->campaignName }}</td>
                                <td>{{ date_format($pr->created_at, 'M d, Y') }}</td>
                                <td>{{ $pr->user->company }}</td>
                                <td>
                                    <a class="btn btn-info glyphicon glyphicon-eye-open"
                                       href="{{
                                       strtolower(str_replace(' ', '_', $pr->clientName))}}/{{
                                       strtolower(str_replace(' ', '_', $pr->campaignName)) }}">
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-info glyphicon glyphicon-edit"
                                       href="proposal_requests/{{ $pr->id }}/edit">
                                    </a>
                                </td>
                                <td>
                                    <form class="delete_form" method="POST" action="proposal_requests/{{ $pr->id }}">
                                        {{csrf_field()}}
                                        {{ method_field('DELETE') }}
                                        <div class="form-group">
                                            <a class="btn btn-danger glyphicon glyphicon-trash delete-btn"></a>
                                        </div>
                                    </form>
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
