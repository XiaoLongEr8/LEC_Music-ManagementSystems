<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style/login.css')}}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>Login</title>
</head>

<body>

    <nav class="navBar_Container">
        <p>Lyrics-Go</p>
    </nav>

    <main class="main_container">
        <div class="login_container">
            <section class="title_container">
                <h1 class="login_title">Sign in to yout account</h1>
                <h3 class="login_subtitle">Please sign in to your account</h3>
            </section>

            <form action="{{ route('google.redirect') }}">
                <div class="google_sign_container">
                    <button class="btn_sign_google">
                        <img src="image/G_Logo.png" class="img_google" alt="">
                        <p> Login with Google </p>
                    </button>
                </div>
            </form>

            <div class="split_container">
                <hr>
                <p>Or</p>
                <hr>
            </div>

            <form action="{{ route('login') }}" method="POST">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach

                @csrf
                <section class="input_Row_Section">
                    {{-- @if ($errors->any())
                <span>
                    @foreach ($errors->all() as $error)
                        <li><strong>{{ $error }}</strong></li>
                    @endforeach
                </span>
                @endif --}}
                    <div class="input_Column_Section">
                        <label for="email" class="item_Title">Email</label>
                        <input type="email" class="email" id="email_Value" placeholder="Email"
                            aria-describedby="emailHelp" required name="email">
                    </div>
                </section>

                <section class="input_Row_Section">
                    <div class="input_Column_Section">
                        <label for="pass">Password</label>
                        <input type="password" id="pass" placeholder="Password" name="password" minlength="8"
                            required name="password">
                    </div>
                </section>

                <div class="input_Row_Section">
                    <div class="aggrement_Container">
                        <input class="form-check-input" type="checkbox" checked="{{ $loginCookie != null }}>"
                            id="invalidCheck" name="remember">
                        <label class="form-check-label" for="invalidCheck">
                            Remember me
                        </label>
                    </div>
                    {{-- <div class="forget_password_container">
                        <a href="">Forget password?</a>
                    </div> --}}
                </div>

                <div class="Submit_BTN_Container">
                    <button class="btn btn-primary" type="submit">Login</button>
                </div>

            </form>

            <section class="anchor_Section">
                <h4 class="Login_Anchor">Don't have an account? <a href="/register">Click Here</a></h4>
            </section>

        </div>
        <div class="picture_container">
            <picture>
                <img src="image/login.png">
            </picture>
        </div>
    </main>
</body>

</html>
