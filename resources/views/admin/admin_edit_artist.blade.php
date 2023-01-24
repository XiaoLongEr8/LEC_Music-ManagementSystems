@extends('layouts.admin')

@section('pageTitleAdmin')

@section('contentsAdmin')

<section class="admin-edit-artist">

    <section class="admin-artist-title">
        <h2>Edit Artist</h2>
    </section>

    <section class="admin-form">
        <form action="{{route('edit.artist')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach

            <label for="input-artist-name">Name</label>
            <input type="text" class="form-control" id="input-artist-name" placeholder="Enter Name" name="fullname" value="{{$artist->fullname}}">

            <label for="input-artist-profile">Profile Picture</label>
            <input type="file" class="form-control-file" id="input-artist-profile" name="profile_pic">

            <label for="input-artist-bio">Bio</label>
            <textarea class="form-control" id="input-artist-bio" rows="5" name="bio">{{$artist->bio}}</textarea>

            <label for="input-artist-nationality">Nationality</label>
            <input type="text" class="form-control" id="input-artist-nationality" placeholder="Enter Nationality" name="nationality" value="{{$artist->nationality}}">

            <input type="hidden" name="id" value="{{$artist->id}}">

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" onclick="history.back()" class="btn btn-danger">Cancel</button>
        </form>
    </section>

</section>

@endsection
