@extends('layouts.admin')

@section('pageTitleAdmin')

@section('contentsAdmin')

<section class="admin-add-artist">

    <section class="admin-artist-title">
        <h2>Add New Artist</h2>
    </section>

    <section class="admin-form">
        <form action="" method="">
            <label for="input-name">Name</label>
            <input type="text" class="form-control" id="input-name" placeholder="Enter Name" name="input-name">

            <label for="input-profile">Profile Picture</label>
            <input type="file" class="form-control-file" id="input-profile" name="input-profile">

            <label for="input-bio">Bio</label>
            <textarea class="form-control" id="input-description" rows="5" name="input-bio"></textarea>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="submit" class="btn btn-danger">Cancel</button>
        </form>
    </section>

</section>

@endsection
