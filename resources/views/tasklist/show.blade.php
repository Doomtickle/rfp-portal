@extends('adminlte::layouts.app')

@section('main-content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-10">
                <span style="display:inline-block;"><h1>{{ $tasklist->name }}</h1></span>
                <hr>
                @include('partials.add_task_form')
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Task Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tasklist->tasks as $task)
                            <tr>
                                <td>{{ $task->task_name }}</td>
                                <td>{{ $task->due_date }}</td>
                                <td>{{ $task->complete }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
