@extends('layouts.admin')

@section('pageTitleAdmin')

@section('contentsAdmin')

<section class="admin-add-artist">

    <section class="admin-artist-title">
        <h2>Add New Artist</h2>
    </section>

    <section class="admin-form">
        <form action="" method="">
            <label for="input-artist-name">Name</label>
            <input type="text" class="form-control" id="input-artist-name" placeholder="Enter Name" name="input-artist-name">

            <label for="input-artist-profile">Profile Picture</label>
            <input type="file" class="form-control-file" id="input-artist-profile" name="input-artist-profile">

            <label for="input-artist-bio">Bio</label>
            <textarea class="form-control" id="input-artist-bio" rows="5" name="input-artist-bio"></textarea>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="submit" class="btn btn-danger">Cancel</button>
        </form>
    </section>

</section>

@endsection
