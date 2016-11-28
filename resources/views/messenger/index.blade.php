@extends('adminlte::layouts.app')

@section('main-content')
    @if (Session::has('error_message'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('error_message') }}
        </div>
    @endif
    <div class="container">
        <a class="btn btn-primary" href="/messages/create">New Message &gt;</a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @if($threads->count() > 0)
                    @foreach($threads as $thread)
                        <?php $class=$thread->isUnread($currentUserId) ? 'alert-info' : ''; ?>
                        <div class="media alert {{ $class }}">
                            <h4 class="media-heading">{!! link_to('messages/' . $thread->id, $thread->subject) !!}</h4>
                            @foreach($thread->messages->reverse()->load('user') as $message)
                                {{--                <p>{{ $thread->latestMessage->body }}</p>--}}
                                <p style="background:#fff;padding:10px;">
                                   <span><strong>{{$message->user->first_name}} {{$message->user->last_name}}: </strong></span>
                                    {{$message->body}}
                                    <span class="pull-right"><small>{{ $message->created_at->diffForHumans() }}</small></span>
                                </p>
                            @endforeach
                            <p>
                                <small><strong>Creator:</strong>
                                    {{ $thread->creator()->first_name }} {{ $thread->creator()->last_name }}</small>
                            </p>
                            <p>
                                <small><strong>Participants:</strong> {{ $thread->participantsString(Auth::id()) }}
                                </small>
                            </p>
                        </div>
                    @endforeach
                @else
                    <p>Sorry, no threads.</p>
                @endif
            </div>
        </div>
    </div>
@stop
