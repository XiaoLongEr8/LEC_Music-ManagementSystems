@extends('layouts.guest')

@section('link')
    {{-- Css --}}
    <link rel="stylesheet" href="css/style/artistDetail.css">

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
                    <img src="./image/album-cover.jpeg" alt="">
                </div>
                <div class="artist_info">
                    <div class="name_artist_container">
                        <h2 class="name"> {{$artist->name}}{{--Ardhito Pranomo--}}</h2>
                    </div>
                    <div class="nationality_container">
                        <h5 class="nationality_label">Nationality:</h5>
                        <h3 class="nationality">{{$artist->nationality}}{{--Indonesian--}}</h3>
                    </div>
                </div>
            </div>
            <div class="artist_biography_container">
              <h2 class="artist_biography_title">Biography</h2>
              <p class="artist_biography">{{$artist->biography}}{{--Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut viverra blandit nibh, nec consectetur augue ornare a. Suspendisse eleifend lorem cursus, dignissim est sagittis, pretium dui. Fusce lacinia cursus tempus. Duis a orci nec justo placerat hendrerit in quis felis. Sed sit amet tempus risus. Ut mollis nisl sit amet risus euismod, vitae convallis libero porttitor. Integer tempus, erat vitae fringilla fringilla, ex metus porttitor lacus, imperdiet pharetra turpis enim in libero. Lorem ipsum dolor sit amet, consectetur adipiscing--}}</p>
            </div>    
            <div class="artist_album_container">
              <h2 class="artist_album_title">Album</h2>
              <table class="artist_album_table">
                <tr class="artist_album_label">
                  <th class="label_cover">Album Cover</th>
                  <th class="label_name">Album Name</th>
                  <th class="label_date">Album Date</th>
                  <th class="label_view">View Album</th>
                </tr>
                {{-- loop this --}}
                @foreach ($album as $data)
                  <tr class="artist_album">
                    <td class="album_cover_container"><img src={{$data->img}}{{--"./image/album-cover.jpeg"--}} alt="" class="album_cover"></td>
                    <td class="album_name"><h3>{{$data->title}}{{--BitterLove--}}</h3></td>
                    <td class="album_release_date"><h3>{{$data->release_date}}{{--23 January 2020--}}</h3></td>
                    <td class="album_view_btn_container"><a href="/artist/show/{{$data->id}}"><button class="btn_view_album">View</button></a></td>
                  </tr>
                @endforeach
                
              </table>
            </div>
        </div>
    </main>
@endsection
