@extends('layouts.guest')

@section('link')
    {{-- Css --}}
    <link rel="stylesheet" href="{{ asset('css/style/profileDetail.css') }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    {{-- Bootstrap Css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
@endsection

@section('container')
    <section class="main_container">
        <div class="right_container">
            <h1>My Profile</h1>
            <img src="/image/album-cover.jpeg" alt="not found" class="profile_picture">
            <h4>Welcome {{ $user->username }}</h4>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Edit Profile Picture
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input class="form-control @error('image')
                is-invalid
            @enderror"
                                type="file" id="profile_pic" name="profile_pic">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="">
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="left_container">
            <h1 class="update_title">Update Profile</h1>
            <form action="" method="POST">
                @method('PUT')
                @csrf
                <section class="input_Row_Section">
                    <div class="input_Column_Section">
                        <label for="full_name" class="item_Title">Full Name</label>
                        <input type="text" class="full_Name" id="full_Name_Value" placeholder="Full Name" name="fullname"
                            value="{{ $user->fullname }}" required>
                    </div>
                </section>
                <section class="input_Row_Section">
                    <div class="input_Column_Section">
                        <label for="username" class="item_Title">Username</label>
                        <input type="text" class="username" id="username" placeholder="Username" name="username" value="{{ $user->username }}"
                            required>
                    </div>
                </section>
                <section class="input_Row_Section">
                    <div class="input_Column_Section">
                        <label for="email" class="item_Title">Email</label>
                        <input type="email" class="email" id="email_Value" placeholder="Email"
                            aria-describedby="emailHelp" name="email" value="{{ $user->email }}" required>
                    </div>
                </section>
                <section class="input_Row_Section">
                    <div class="input_Column_Section">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" pattern="^(^\+62|62|^08)(\d{3,4}-?){2}\d{3,4}$"
                            placeholder="Phone Number" name="phone_num" value="{{ $user->phone_num }}" required>
                    </div>
                </section>
                <div class="Submit_BTN_Container">
                    <button class="btn btn-primary" type="submit">Save changes</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
@endsection
