<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gospel Conversations</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title">
                Gospel Conversations
            </div>
            <div class="subtitle m-b-md">
                Conversation Manager
            </div>
            <div class="paragraph">
                The Gospel Conversations voice assistant skill
                acts as a sparing partner to let you
                practice sharing your faith. Alexa asks you a
                question, you respond, it responds to you,
                and now you’re having a conversation. If you
                say something where it doesn’t have a programmed
                response, then it asks if you would like to hear
                one where it has a response, and now it is
                training you. <br /><br />
                Available soon for Amazon Alexa.
            </div>
            <img src="..\images\amazonalexa.png" />

            {{--
                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div> --}}
        </div>
    </div>
</body>

</html>
