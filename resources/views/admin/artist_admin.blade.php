@extends('layouts.admin')

@section('pageTitleAdmin')

@section('contentsAdmin')
    <section id="AdminArtist" class="admin-section">
        <h1 class="admin-pagetitle">Artist List</h1>

        <div class="content-wrapper">
            <table class="artist-table admin-table">
                <tr class="heading-table">
                    <th class="col-artist-1">No</th>
                    <th class="col-artist-2">Artist</th>
                    <th class="col-artist-3">Nationality</th>
                    <th class="col-artist-4">Detail</th>
                    <th class="col-artist-5">Edit</th>
                    <th class="col-artist-6">Delete</th>
                </tr>


                @foreach ($artists as $artist)
                    <tr>
                        <td>{{ (request('page', 1) - 1) * 10 + $loop->index + 1 }}</td>
                        <td>{{ $artist->fullname }}</td>
                        <td>{{ $artist->nationality }}</td>
                        <td>
                            <a href="{{ route('artist.show', $artist->id) }}">
                                <button class="table-adminbutton viewlyrics">Artist Detail</button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('redirect.edit.artist', $artist->id) }}">
                                <button class="table-adminbutton editlyrics">Edit</button>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('delete.artist', $artist->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="table-adminbutton deletelyrics">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $artists->links() }}
            <a href="/add-artist">
                <button class="add-new-item">
                    <ion-icon name="add-outline"></ion-icon>
                    <p>Add New Artist</p>
                </button>
            </a>
        </div>
    </section>
@endsection
