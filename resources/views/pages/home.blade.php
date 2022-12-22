@extends('layouts.guest')

@section('link')
    {{-- Css --}}
    <link rel="stylesheet" href="css/style/home.css">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
@endsection

@section('container')
    <main class="main_container">

        <section class="first_section">
            <div class="left_content">
                <h1 class="main_title">
                    Welcome to <br>
                    Lyrics-Go!</h1>
                <h5 class="sub_title">
                    Search your favorite song lyrics <br>
                    and sing-along!</h5>
            </div>

            <picture>
                <img src="image/listening-happy-music.png" alt="Happy Music IMG">
            </picture>
        </section>

        <section class="second_section">
            <div class="title_section">
                <h2>Let's Explore the world of Music!</h2>
            </div>

            <div class="search_section">
                <button type="" class="search_button"><img src="image/search_logo.png" alt="Search logo"></button>
                <form action="" class="search_input">
                    <input type="text" placeholder="Search song title, artist, or lyrics...">
                </form>
            </div>

        </section>

    </main>
@endsection
