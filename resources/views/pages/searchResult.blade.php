@extends('layouts.guest')

@section('link')
    {{-- Css --}}
    <link rel="stylesheet" href="css/style/searchResult.css">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
@endsection

@section('container')
    <main class="main_container">

        <section class="result_container separated_container">

            <h2 class="result_title">Looking for "Song Title"</h2>

            <div class="result_list_container">

                <article class="result_card_container">

                    <section class="left_content">
                        <img src="https://picsum.photos/100" alt="this is image" class="song_album_img">
                        <div class="title_author_content">
                            <h2>Song Title</h2>
                            <h5>Song Author</h5>
                        </div>
                    </section>

                    <section class="right_content">
                        <button class="view_lyrics_btn">View Lyrics</button>
                    </section>

                </article>

            </div>

        </section>

        {{-- Jika sudah integrasi dengan BE hapus stylenya --}}
        <section class="non_result_container" style="display: none">
            <h2 class="result_title">Looking for "Song Title"</h2>

            <h6 class="non_result_desc">
                Sorry, we cannot find the song or artist that you are searching for :(
            </h6>
        </section>

        <section class="btn_request_container separated_container">
            <button class="btn_request">Request Song</button>
        </section>

    </main>
@endsection
