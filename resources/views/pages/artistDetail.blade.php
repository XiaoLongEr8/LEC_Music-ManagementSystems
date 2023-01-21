@extends('layouts.guest')

@section('link')
    {{-- Css --}}
    <link rel="stylesheet" href="{{asset('css/style/artistDetail.css')}}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
@endsection

@section('container')
    <main class="main_container">
        <div class="artist_detail separated_container">
            <div class="artist_detail_top_container">
                <div class="artist_picture">
                    <img src="{{$artist->profile_pic}}" alt="">
                </div>
                <div class="artist_info">
                    <div class="name_artist_container">
                        <h2 class="name"> {{$artist->fullname}}</h2>
                    </div>
                    <div class="nationality_container">
                        <h5 class="nationality_label">Nationality:</h5>
                        <h3 class="nationality">{{$artist->nationality}}</h3>
                    </div>
                </div>
            </div>
            <div class="artist_biography_container">
              <h2 class="artist_biography_title">Biography</h2>
              <p class="artist_biography">{{$artist->bio}}</p>
            </div>
            <div class="artist_album_container">
              <h2 class="artist_album_title">Albums</h2>
              <table class="artist_album_table">
                <tr class="artist_album_label">
                  <th class="label_cover">Album Cover</th>
                  <th class="label_name">Album Name</th>
                  <th class="label_date">Album Date</th>
                </tr>
                @foreach ($artist->albums as $album)
                  <tr class="artist_album">
                    <td class="album_cover_container"><img src={{asset($album->cover_image)}} alt="" class="album_cover"></td>
                    <td class="album_name"><h3>{{$album->title}}</h3></td>
                    <td class="album_release_date"><h3>{{$album->artistDetailRelease()}}</h3></td>
                @endforeach

              </table>
            </div>
        </div>
    </main>
@endsection
