@extends('layouts.admin')

@section('pageTitleAdmin')

@section('contentsAdmin')

<section class="admin-add-song">

    <section class="admin-song-title">
        <h2>Add New Song</h2>
    </section>

    <section class="admin-form">

        <form action="" method="">
            <label for="input-title">Title</label>
            <input type="text" class="form-control" id="input-title" placeholder="Enter Title" name="input-title">

            <label for="input-artist">Artist</label>
            <select id="input-artist" class="form-control" name="input-artist">
                <option>Choose...</option>
                {{-- Loop Artist --}}
            </select>

            <label for="input-lyric">Description</label>
            <textarea class="form-control" id="input-description" rows="3" name="input-description"></textarea>

            <label for="input-view">Views</label>
            <input type="text" class="form-control" id="input-view" placeholder="Enter Number of Views" name="input-view">

            <label for="input-release-date">Release Date</label>
            <input type="text" class="form-control" id="input-release-date" placeholder="Enter Release Date" name="input-release-date">

            <label for="input-lyric">Song Lyric</label>
            <textarea class="form-control" id="input-lyric" rows="8" name="input-lyric"></textarea>

            <label for="input-album">Album Picture</label>
            <input type="file" class="form-control-file" id="input-album" name="input-album">

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="submit" class="btn btn-danger">Cancel</button>
        </form>

    </section>

</section>

@endsection
