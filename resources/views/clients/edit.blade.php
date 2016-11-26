@extends ('layouts.app')

@section('main-content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-10">
                <h1>Edit Client Info</h1>
                <hr>
                <form method="POST" action="/client_list/{{ $client->id }}">
                    {{method_field('PATCH')}}
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @include('partials.edit_client_form')
                </form>
            </div>
        </div>
    </div>
@endsection
