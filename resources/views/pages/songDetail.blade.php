@extends('layouts.guest')

@section('link')
    {{-- Css --}}
    <link rel="stylesheet" href="css/style/songDetail.css">

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
                    <img src="./image/album-cover.jpeg" alt="">
                </div>
                <div class="song_info">
                    <div class="title_artist_container">
                        <h2 class="title">Bitterlove</h2>
                        <h3 class="artist">Ardhito Pranomo</h3>
                    </div>
                    <div class="view_container">
                        <img src="./image/view_eye_img.png" alt="" class="view-img">
                        <div class="view_number">
                            <h4 class="views">2,652 Views</h4>
                        </div>
    
                    </div>
                </div>
                <div class="release_date_container">
                    <h4 class="release_date_label">Release Date:</h4>
                    <h3 class="release_date">October 12, 2019</h3>
                </div>
            </div>
            <div class="lyrics">
                There is bitter in everyday
                But then I feel it
                That you would be the only one
                Sometimes it doesn't have to be so sure
                The sweetest love can be so hard to find
    
                We'll be better in every way
                But then I would go to be in other space
                Sometimes, the bitter of love can be so good
                It's like a coffee with a rainbow's mood
    
                Sometimes you feel off but sometimes you feel it right
                Is it to be, or it is not to be
                To fall in love again, to be the one for me
                Sometimes you fall, but there'll be time we'll be together
    
                We'll be mad in every way
                Then I remember, the store we went last September
                Sometimes, recalling things would be so good
                It's like perfect cake, that my grandma's made
    
                Sometimes you feel off but sometimes you feeling right
                Is it to be, or it is not to be
                To fall in love again, to be the one for me
                Sometimes you fall, but there'll be time we'll be with together
    
                We'll be better, in every way
                But then I would, go to be in other space
                Sometimes, the bitter of love can be so good
                It's like a coffee with a rainbow
                It's like a coffee with a rainbow
                It's like a coffee with a rainbow's mood
                With a rainbow's mood
            </div>
            <div class="rating">
                <button class="btn_thumbsup"><img src="./image/thumbs-up.png" alt=""></button>
                <button class="btn_thumbsdown"><img src="./image/thumbs-down.png" alt=""></button>
            </div>
    
            <div class="song_detail_bottom_container">
                <div class="song_about_container">
                    <h2 class="song_about_title">About BitterLove</h2>
                    <p class="song_about">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut viverra blandit nibh, nec consectetur augue ornare a. Suspendisse eleifend lorem cursus, dignissim est sagittis, pretium dui. Fusce lacinia cursus tempus. Duis a orci nec justo placerat hendrerit in quis felis. Sed sit amet tempus risus. Ut mollis nisl sit amet risus euismod, vitae convallis libero porttitor. Integer tempus, erat vitae fringilla fringilla, ex metus porttitor lacus, imperdiet pharetra turpis enim in libero. Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                </div>
        
                <div class="request_container">
                    <h3>Found a mistake in the song?</h3>
                    <button class="btn_request">Request Edit</button>
                    <p>if you have found a mistake in our lyrics, please feel free to submit an 'Edit Request' form and let us know where we have of mistakes</p>
                </div>
            </div>
        </div>
    </main>
@endsection
