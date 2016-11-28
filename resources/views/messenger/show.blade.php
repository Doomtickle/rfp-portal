@extends('adminlte::layouts.app')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid box-primary direct-chat direct-chat-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$thread->subject}}</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <!-- Conversations are loaded here -->
                        <div id="message-area" class="direct-chat-messages">
                            <!--Current user always on right-->
                            @foreach($thread->messages as $message)
                                @if($message->user == Auth::user())
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name pull-right">
                                {{ $message->user->first_name }} {{ $message->user->last_name }}
                                </span>
                                            <span class="direct-chat-timestamp pull-left">{{date_format($message->created_at, 'M d, Y H:i')}}</span>
                                        </div><!-- /.direct-chat-info -->
                                        <img class="direct-chat-img"
                                             src="//www.gravatar.com/avatar/{{ md5($message->user->email) }}?s=64"
                                             alt="message user image">
                                              <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            {{ $message->body }}
                                        </div><!-- /.direct-chat-text -->
                                    </div><!-- /.direct-chat-msg -->
                                @else
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-left">
                                {{ $message->user->first_name }} {{ $message->user->last_name }}
                            </span>
                                            <span class="direct-chat-timestamp pull-right">{{date_format($message->created_at, 'M d, Y H:i')}}</span>
                                        </div><!-- /.direct-chat-info -->
                                        <img class="direct-chat-img"
                                             src="//www.gravatar.com/avatar/{{ md5($message->user->email) }}?s=64"
                                             alt="user image">
                                              <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            {{$message->body}}
                                        </div><!-- /.direct-chat-text -->
                                    </div><!-- /.direct-chat-msg -->
                                @endif
                            @endforeach
                        </div><!--/.direct-chat-messages-->

                    </div><!-- /.direct-chat-pane -->
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <form id="message-form" action="/messages/{{$thread->id}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('put')}}
                        <div class="input-group">
                            <input type="text" id="message" name="message" placeholder="Type Message ..."
                                   class="form-control">
                            <span class="input-group-btn">
        <button type="submit" class="btn btn-primary btn-flat form-control">Send</button>
      </span>
                        </div>
                    </form>
                </div><!-- /.box-footer-->
            </div>
        </div>
    </div>
@stop
@section('scripts.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
        var textarea = document.getElementById('message-area');
        textarea.scrollTop = textarea.scrollHeight;
    </script>
    <script>
        {{--$("#message-form").submit(function (e) {--}}

            {{--var url = "/messages/{{ $thread->id }}"; // the script where you handle the form input.--}}

            {{--$.ajax({--}}
                {{--type: "POST",--}}
                {{--url: url,--}}
                {{--data: $('#message-form').serialize(),--}}
                {{--datatype: "json",--}}
                {{--success: function (data) {--}}

                {{--}--}}
            {{--});--}}
            {{--e.preventDefault(); // avoid to execute the actual submit of the form.--}}
        {{--});--}}
    </script>
@stop
