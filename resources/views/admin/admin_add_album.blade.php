@extends('layouts.admin')

@section('pageTitleAdmin')

@section('contentsAdmin')

<section class="admin-add-album">

    <section class="admin-album-title">
        <h2>Add New Album</h2>
    </section>

    <section class="admin-form">
        <form action="{{route('create.album')}}" method="POST" enctype="multipart/form-data">
            @csrf

            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach

            <label for="input-album-name">Title</label>
            <input type="text" class="form-control" id="input-album-name" placeholder="Enter Title" name="title">

            <label for="input-album-artist">Artist</label>
            <select id="input-album-artist" class="form-control" name="artist_id">
                @foreach($artists as $artist)
                    <option value={{$artist->id}}>{{$artist->fullname}}</option>
                @endforeach
            </select>

            <label for="input-album-description">Description</label>
            <textarea class="form-control" id="input-album-description" rows="3" name="description"></textarea>

            <label for="input-album-release-date">Release Date</label>
            <input type="date" class="form-control" id="input-album-release-date" placeholder="Enter Release Date" name="release_date">

            <label for="input-album-contributors">Contributors</label>
            <textarea class="form-control" id="input-album-contributors" rows="3" name="contributors"></textarea>

            <label for="input-album-type">Type</label>
            <select id="input-album-type" class="form-control" name="album_type_id">
                @foreach ($types as $type)
                    <option value={{$type->id}}>{{$type->name}}</option>
                @endforeach
            </select>

            <label for="input-album-cover">Cover Image</label>
            <input type="file" class="form-control-file" id="input-album-cover" name="cover_image">

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" onclick="history.back()" class="btn btn-danger">Cancel</button>
        </form>
    </section>

</section>

@endsection
