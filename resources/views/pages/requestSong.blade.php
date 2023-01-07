@extends('layouts.guest')

@section('link')
    {{-- CSS --}}
    <link rel="stylesheet" href="css/style/requestSong.css">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
@endsection

@section('container')
    <main class="main_container">
        <form action="" method="post" class="form_container" id="request_form_id">
            @csrf

            <div class="body_input_container">
                <label for="body" class="input_label">Request </label>
                <textarea name="body" id="body" class="input_textbox" form="request_form_id" cols="30" rows="10"
                    placeholder="Input the your request" required></textarea>
            </div>

            <div class="Submit_BTN_Container">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </main>
@endsection
