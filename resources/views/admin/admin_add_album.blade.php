@extends('layouts.admin')

@section('pageTitleAdmin')

@section('contentsAdmin')

<section class="admin-add-album">

    <section class="admin-album-title">
        <h2>Add New Artist</h2>
    </section>

    <section class="admin-form">
        <form action="" method="">
            <label for="input-album-name">Title</label>
            <input type="text" class="form-control" id="input-album-name" placeholder="Enter Title" name="input-album-name">

            <label for="input-album-description">Description</label>
            <textarea class="form-control" id="input-album-description" rows="3" name="input-album-description"></textarea>

            <label for="input-album-release-date">Release Date</label>
            <input type="text" class="form-control" id="input-album-release-date" placeholder="Enter Release Date" name="input-album-release-date">

            <label for="input-album-contributor">Contributor</label>
            <input type="text" class="form-control" id="input-album-contributor" placeholder="Enter Contributor" name="input-album-contributor">

            <label for="input-album-type">Type</label>
            <select id="input-album-type" class="form-control" name="input-album-type">
                <option value=1>Single</option>
                <option value=2>Long Playlist</option>
                <option value=3>Extended Playlist</option>
            </select>

            <label for="input-album-cover">Cover Image</label>
            <input type="file" class="form-control-file" id="input-album-cover" name="input-album-cover">

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="submit" class="btn btn-danger">Cancel</button>
        </form>
    </section>

</section>

@endsection
