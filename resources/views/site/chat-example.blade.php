<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Node host:port -->
        <meta name="NODE_HOST" content="{{ env('NODE_HOST') }}">
        <meta name="NODE_PORT" content="{{ env('NODE_PORT') }}">
        <meta name="APP_URL" content="{{ env('APP_URL') }}">
        <meta name="NODE_MODE" content="{{ env('NODE_MODE') }}">
        <!-- TODO: user Auth::check() and Auth::user() data here instead of this test data-->
        <meta name="user_id" content="101">
        <meta name="user_type" content="User">
        <meta name="user_name" content="TOCAAN">
        <meta name="user_avatar" content="{{asset('/storage/images/users/default.png')}}">

        <title>TOCAAN</title>

    </head>
    <body>

        <div id="app">
            <!-- chat component -->
            <chat-component :members="{{$members}}" :messages="{{$messages}}" :room="{{$room}}"></chat-component>
            <!-- end chat component -->
        </div>
        
        <script src="{{asset('site/js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>

</html>