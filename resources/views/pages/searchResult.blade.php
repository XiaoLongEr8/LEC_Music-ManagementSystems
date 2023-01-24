@extends('layouts.guest')

@section('link')
    {{-- Css --}}
    <link rel="stylesheet" href="{{ asset('css/style/searchResult.css') }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    {{-- Fonts --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
@endsection

@section('container')
    <main class="main_container">

        @if (!$results->isEmpty())
            <section class="result_container separated_container">

                <h2 class="result_title">Looking for {{ request('q') }}</h2>

                <div class="result_list_container">

                    @foreach ($results as $result)
                        <article class="result_card_container">
                            <section class="left_content">
                                <img src="{{ $result->album_id ? asset($result->album->cover_image) : asset($result->profile_pic) }}"
                                    alt="this is image" class="song_album_img">
                                <div class="title_author_content">
                                    <h2>{{ $result->name }}</h2>
                                    <h5>{{ $result->album_id ? $result->album->artist->fullname : '' }}</h5>
                                </div>
                            </section>

                            <section class="right_content">
                                <form
                                    action="{{ $result->album_id ? route('song.show', $result->id) : route('artist.show', $result->id) }}">
                                    <button class="view_lyrics_btn">View
                                        {{ $result->album_id ? 'Lyrics' : 'Artist' }}</button>
                                </form>
                            </section>

                        </article>
                    @endforeach

                </div>
                {{ $results->links() }}
            </section>


            {{-- If the results are empty --}}
        @else
            <section class="non_result_container">
                <h2 class="result_title">Looking for {{ request('q') }}</h2>

                <h6 class="non_result_desc">
                    Sorry, we cannot find the song or artist that you are searching for :(
                </h6>
            </section>
        @endif

        <section class="btn_request_container separated_container">
            <form action="{{route('song.create.req')}}">
                <button class="btn_request">Request Song</button>
            </form>
        </section>

    </main>
@endsection
