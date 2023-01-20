@extends('layouts.guest')

@section('link')
    {{-- Css --}}
    <link rel="stylesheet" href="{{asset('css/style/home.css')}}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
@endsection

@section('container')
    <main class="main_container">

        <section class="introduction_container separated_container">
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

        <section class="search_container separated_container">
            <div class="title_section">
                <h2>Let's Explore the world of Music!</h2>
            </div>

            <div class="search_section">
                <button type="" class="search_button"><img src="image/search_logo.png" alt="Search logo"></button>
                <form action="{{route('search')}}" class="search_input">
                    <input type="text" placeholder="Search song title, artist, or lyrics..." name="q">
                </form>
            </div>

        </section>

        <section class="compDesc_container separated_container">
            <h2 class="comdesc_title">What is Lyrics-Go?</h2>
            <p class="comdesc_content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel turpis fringilla,
                pretium quam non,
                lobortis eros. Cras at ullamcorper purus, vitae vehicula augue. In ac vulputate massa. Aenean sodales, urna
                ut convallis pellentesque, turpis odio malesuada sem, ac efficitur nulla mi ut nulla. Vestibulum vitae
                consequat diam, in consectetur sapien.</p>
        </section>

        <section class="latestSong_container separated_container">
            <h1 class="latestSong_SecTitle">Latest Song</h1>

            <div class="song_card_container">
                {{-- Looping this card layout when integration with BE --}}
                @foreach ($latest as $song)
                    <a href="{{route('artist.show', ['id'=>$song->id])}}" style="color:black; text-decoration:none;">
                        <article class="song_card">
                            <img src="{{ $song->album->cover_image }}" alt="Album Cover" class="song_album_img">
                            {{-- <div class="song_album_img"></div> --}}
                            <h1 class="song_title">{{ $song->title }}</h1>
                            <h6 class="song_author">{{ $song->album->artist->fullname }}</h6>
                            <h5 class="song_timespam">{{ $song->time_ago }}</h5>
                        </article>
                    </a>
                @endforeach
            </div>
        </section>

        <section class="leaderboard_container separated_container">
            <h1 class="leaderboard_SecTitle">Leaderboard</h1>
            <table class="leaderboard_table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Song Title</th>
                        <th>Artist</th>
                        <th>Released Date</th>
                        <th>Views</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Looping this for load the data --}}
                    @foreach ($top as $song)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $song->title }}</td>
                            <td>{{ $song->album->artist->fullname }}</td>
                            <td>{{ $song->album->formattedReleaseDate() }}</td>
                            <td>{{ $song->formattedViews() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

    </main>
@endsection
