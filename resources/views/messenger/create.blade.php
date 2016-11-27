@extends('adminlte::layouts.app')

@section('main-content')
    <div class="container">
        <div class="col-md-10">
            <h1>Create a new message</h1>
            <form action="/messages" method="POST">
                {{csrf_field()}}
                @if($users->count() > 0)
                    <div class="form-group">
                        {{--<label title="{{ $user->last_name }}"><input--}}
                        {{--type="checkbox" name="recipients[]" value="{{ $user->id }}">--}}
                        {{--{!!$user->first_name!!} {!! $user->last_name !!}--}}
                        <label for="message_recipient">To:</label>
                        <select id="message_recipient" class="message_recipient form-control"
                                multiple="multiple" name="recipients[]">
                            @foreach ($users as $userOption)
                                <option value="{{$userOption->id}}">{{$userOption->first_name}} {{$userOption->last_name}}</option>
                            @endforeach

                        </select>
                    </div>

            @endif
            <!-- Subject Form Input -->
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" id="subject" class="form-control" value="{{ old('subject') }}">
                </div>

                <!-- Message Form Input -->

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" rows="10" class="form-control" value="{{ old('message') }}">

                </textarea>
                </div>

                <!-- Submit Form Input -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Send message</button>
                </div>
            </form>
        </div>
    </div>
@stop
@section('scripts.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
        $('.message_recipient').select2();
    </script>
@stop

