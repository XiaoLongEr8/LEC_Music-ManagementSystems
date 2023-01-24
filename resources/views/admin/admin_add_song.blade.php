@extends('layouts.admin')

@section('pageTitleAdmin')

@section('contentsAdmin')

<section class="admin-add-song">

    <section class="admin-song-title">
        <h2>Add New Song</h2>
    </section>

    <section class="admin-form">

        <form action="{{route('create.song')}}" method="POST">
            @csrf

            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach

            <label for="input-song-title">Title</label>
            <input type="text" class="form-control" id="input-song-title" placeholder="Enter Title" name="title">

            <div id="input-song">
                <label for="input-song-genre">Genre</label>
                <select id="input-song-genre" class="form-control" name="genres[]">
                    @foreach($genres as $genre)
                        <option value={{$genre->id}}>{{$genre->name}}</option>
                    @endforeach
                </select>
            </div>

            <div id="genre-button" style="margin-bottom: 2rem">
                <button type="button" class="btn btn-primary" id="btn_add">Add</button>
                <button type="button" class="btn btn-danger" id="btn_remove">Remove</button>
            </div>

            <label for="input-song-description">Description</label>
            <textarea class="form-control" id="input-description" rows="3" name="description"></textarea>

            <label for="input-song-view">Views</label>
            <input type="number" class="form-control" id="input-song-view" placeholder="Enter Number of Views" name="view_count">

            <label for="input-song-lyric">Song Lyric</label>
            <textarea class="form-control" id="input-song-lyric" rows="8" name="lyrics"></textarea>

            <label for="input-song-album">Album</label>
            <select id="input-song-album" class="form-control" name="album_id">
                @foreach($albums as $album)
                    <option value={{$album->id}}>{{$album->title}} by {{$album->artist->fullname}}</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" onclick="history.back()" class="btn btn-danger">Cancel</button>
        </form>

    </section>

</section>

<script>
    document.getElementById('btn_add').addEventListener('click', function() {
        var select = document.createElement('select');
            select.id = "extra";
            select.classList.add('form-control');
            select.name = 'genres[]';
            select.required = true;

        @foreach ($genres as $genre)
            var option = document.createElement('option');
                option.value = '{{$genre->id}}';
                option.text = '{{$genre->name}}';
                select.appendChild(option);
        @endforeach

        var container = document.getElementById('input-song')
        container.appendChild(select);
    });

    document.getElementById('btn_remove').addEventListener('click', function() {
        var last = document.getElementById("extra");

        last.remove();
    });
</script>

{{-- Dummy Java yg bekerja --}}
{{-- <script>
    document.getElementById('btn_add').addEventListener('click', function() {

        var select = document.createElement('select');
            select.id = "extra";
            select.classList.add('form-control');
            select.name = 'input-song-genre[]';
            select.required = true;

        var option = document.createElement('option');
            option.value = 1;
            option.text = 'Yes';
            select.appendChild(option);

        var container = document.getElementById('input-song');
        container.appendChild(select);
    });

    document.getElementById('btn_remove').addEventListener('click', function() {

    var last = document.getElementById("extra");

    last.remove();
    });
</script> --}}

@endsection
