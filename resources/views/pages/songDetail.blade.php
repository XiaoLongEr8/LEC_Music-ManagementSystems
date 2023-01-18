@extends('layouts.guest')

@section('link')
    {{--JQuery--}}
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

    {{-- CSS --}}
    <link rel="stylesheet" href={{asset("css/style/songDetail.css")}}>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
@endsection

@section('container')
    <main class="main_container">
        <div class="song_detail separated_container">
            <div class="song_detail_top_container">
                <div class="album_cover">
                    <img src="{{asset($song->album->cover_image)}}" alt="">
                </div>
                <div class="song_info">
                    <div class="title_artist_container">
                        <h2 class="title">{{$song->title}}</h2>
                        <h3 class="artist">{{$song->album->artist->fullname}}</h3>
                    </div>
                    <div class="view_container">
                        <img src={{asset("./image/view_eye_img.png")}} alt="" class="view-img">
                        <h4 class="views">{{$song->formattedViews()}} Views</h4>
                        {{-- <div class="view_number">
                        </div>
     --}}
                    </div>
                </div>
                <div class="release_date_container">
                    <h4 class="release_date_label">Release Date:</h4>
                    <h3 class="release_date">{{$song->album->songDetailRelease()}}</h3>
                </div>
            </div>
            <div class="lyrics">
                {{$song->lyrics}}
            </div>
            <div class="rating">
                <button class="btn_thumbsup {{$song->like?'rating_clicked':''}}" id="like-btn" data-song-id={{$song->id}}><img src={{asset("./image/thumbs-up.png")}} alt=""></button>
                <button class="btn_thumbsdown {{$song->dislike?'rating_clicked':''}}" id="dislike-btn" data-song-id={{$song->id}}><img src={{asset("./image/thumbs-down.png" )}} alt=""></button>
            </div>

            <div class="song_detail_bottom_container">
                <div class="song_about_container">
                    <h2 class="song_about_title">About {{$song->title}}</h2>
                    <p class="song_about">{{$song->description}}</p>
                </div>

                <div class="request_container">
                    <h3>Found a mistake in the song?</h3>
                    <form action="{{route('song.edit.req', ['id'=>$song->id])}}">
                        <button class="btn_request">
                            Request Edit
                        </button>
                    </form>
                    <p>if you have found a mistake in our lyrics, please feel free to submit an 'Edit Request' form and let us know where we have of mistakes</p>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.getElementById("like-btn").addEventListener("click", function(){
            var songId = $(this).data('song-id');
            $.ajax({
                type: "POST",
                url: '/like-dislike',
                data: {'id': songId, 'like': true},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function (response) {
                    document.getElementById("like-btn").classList.toggle("rating_clicked");
                    document.getElementById("dislike-btn").classList.remove("rating_clicked");
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });

        document.getElementById("dislike-btn").addEventListener("click", function(){
            var songId = $(this).data('song-id');
            $.ajax({
                type: "POST",
                url: '/like-dislike',
                data: {'id': songId, 'dislike': true},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function (response) {
                    document.getElementById("dislike-btn").classList.toggle("rating_clicked");
                    document.getElementById("like-btn").classList.remove("rating_clicked");
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    </script>
@endsection
