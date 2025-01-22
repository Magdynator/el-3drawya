<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ATM Web Interface</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    @if (count($errors) > 0)
    <div class="error-message">
        <ul>
            @foreach($errors ->all() as $error)
            <li> {{$error}} </li>
            @endforeach
            <ul>
    </div>
    @endif
    @if(Session::has('fail'))
    <div class="error-message"> {{Session::get('fail')}}</div>
    @endif
    <!-- Login Page -->
    <div id="loginPage" class="page">
        <h1>Welcome to Online ATM</h1>
        <form id="form" action="login" method="post">
            @csrf
            <label for="pin">Enter PIN:</label>
            <input type="password" name="pin" class="input" />
            <button id="submit">Login</button>
        </form>
    </div>

    <script src="script.js"></script>
</body>

</html>