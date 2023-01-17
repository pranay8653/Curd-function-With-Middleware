<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <form action="{{ route('login.user') }}" class="sign-up-form" method="post">
        @csrf

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error  )
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
         @endif

        <div class="form-group">
            <input type="email" class="form-control form-control-user"
                id="exampleInputEmail" aria-describedby="emailHelp"
                placeholder="Enter Email Address..." name="email">
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-user"
                id="exampleInputPassword" placeholder="Password" name="password">
        </div>
        
        {{-- <a href="{{ route('dashboard') }}"> --}}
        <button type="submit" class="btn btn-primary btn-user btn-block">
            Login
        </button>
</body>
</html>
