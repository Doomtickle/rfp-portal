@extends('adminlte::layouts.app')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1>{{ $thread->subject }}</h1>

                @foreach($thread->messages as $message)
                    <div style="border:1px solid #fff;" class="media">
                        <a class="pull-left" href="#">
                            <img src="//www.gravatar.com/avatar/{{ md5($message->user->email) }} ?s=64"
                                 alt="{{ $message->user->name }}" class="img-circle">
                        </a>
                        <div class="media-body">
                            <h5 class="media-heading">{{ $message->user->first_name }} {{$message->user->last_name}}</h5>
                            <p>{{ $message->body }}</p>
                            <div class="text-muted">
                                <small>Posted {{ $message->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach

                <h2>Reply to this message</h2>
                <form action="/messages/{{$thread->id}}" method="POST">
                {{csrf_field()}}
                {{method_field('put')}}
                <!-- Message Form Input -->
                    <div class="form-group">
                        <textarea name="message" id="message" class="form-control" value="{{ old('message') }}">
                            </textarea>
                    </div>
                    @if($users->count() > 0)
                        <div class="form-group">
                            <label for="message_recipient">CC:</label>
                            <select id="message_recipient" class="message_recipient form-control"
                                    multiple="multiple" name="recipients[]">
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                                @endforeach

                            </select>
                        </div>

                @endif

                <!-- Submit Form Input -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Reply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('scripts.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
        $('.message_recipient').select2();
    </script>
@stop
