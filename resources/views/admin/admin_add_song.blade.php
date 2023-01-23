@extends('layouts.admin')

@section('pageTitleAdmin')

@section('contentsAdmin')

<section class="admin-add-song">

    <section class="admin-song-title">
        <h2>Add New Song</h2>
    </section>

    <section class="admin-form">

        <form action="" method="">
            <label for="input-song-title">Title</label>
            <input type="text" class="form-control" id="input-song-title" placeholder="Enter Title" name="input-song-title">

            <label for="input-song-artist">Artist</label>
            <select id="input-song-artist" class="form-control" name="input-song-artist">
                {{-- @foreach($song as $data)
                    <option value={{$data->artist->id}}>{{$data->artist->fullname}}</option>
                @endforeach --}}
            </select>

            <div id="input-song">
                <label for="input-song-genre">Genre</label>
                <select id="input-song-genre" class="form-control" name="input-song-genre[]">
                    {{-- @foreach($song as $data)
                        <option value={{$data->genre->id}}>{{$data->genre->name}}</option>
                    @endforeach --}}
                </select>
            </div>

            <div id="genre-button" style="margin-bottom: 2rem">
                <button type="button" class="btn btn-primary" id="btn_add">Add</button>
                <button type="button" class="btn btn-danger" id="btn_remove">Remove</button>
            </div>

            <label for="input-song-description">Description</label>
            <textarea class="form-control" id="input-description" rows="3" name="input-song-description"></textarea>

            <label for="input-song-view">Views</label>
            <input type="text" class="form-control" id="input-song-view" placeholder="Enter Number of Views" name="input-song-view">

            <label for="input-song-release-date">Release Date</label>
            <input type="text" class="form-control" id="input-song-release-date" placeholder="Enter Release Date" name="input-song-release-date">

            <label for="input-song-lyric">Song Lyric</label>
            <textarea class="form-control" id="input-song-lyric" rows="8" name="input-song-lyric"></textarea>

            <label for="input-song-album">Album</label>
            <select id="input-song-album" class="form-control" name="input-song-album">
                {{-- @foreach($song as $data)
                    <option value={{$data->album->id}}>{{$data->album->title}}</option>
                @endforeach --}}
            </select>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="submit" class="btn btn-danger">Cancel</button>
        </form>

    </section>

</section>

{{-- <script>
    document.getElementById('btn_add').addEventListener('click', function() {
        var select = document.createElement('select');
            select.id = "extra";
            select.classList.add('form-control');
            select.name = 'input-song-genre[]';
            select.required = true;

        @foreach ($song as $data)
            var option = document.createElement('option');
                option.value = '{{$data->genre->id}}';
                option.text = '{{$data->genre->name}}';
                select.appendChild(option);
        @endforeach

        var container = document.getElementById('input-song')
        container.appendChild(select);
    });

    document.getElementById('btn_remove').addEventListener('click', function() {
        var last = document.getElementById("extra");

        last.remove();
    });
</script> --}}

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
