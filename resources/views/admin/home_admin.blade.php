@extends('layouts.admin')

@section('pageTitleAdmin')

@section('contentsAdmin')
    <section id="AdminHome" class="admin-section">
        <h1 class="admin-pagetitle">Song List</h1>

        <div class="content-wrapper">
            <table class="songtitle-table admin-table">
                <tr class="heading-table">
                    <th class="col-1">No</th>
                    <th class="col-2">Song Title</th>
                    <th class="col-3">Artist</th>
                    <th class="col-4">Views</th>
                    <th class="col-5">Release Date</th>
                    <th class="col-6">Lyrics</th>
                    <th class="col-7">Edit</th>
                    <th class="col-8">Delete</th>
                </tr>

                @foreach ($songs as $song)
                    <tr>
                        <td>{{((request('page', 1)-1)*10)+$loop->index+1}}</td>
                        <td>{{$song->title}}</td>
                        <td>{{$song->album->artist->fullname}}</td>
                        <td>{{$song->formattedViews()}}</td>
                        <td>{{$song->album->formattedReleaseDate()}}</td>
                        <td>
                            <a href="{{route('song.show', $song->id)}}">
                                <button class="table-adminbutton viewlyrics">Lyrics</button>
                            </a>
                        </td>
                        <td>
                            <a href="">
                                <button class="table-adminbutton editlyrics">Edit</button>
                            </a>
                        </td>
                        <td>
                            <a href="">
                                <button class="table-adminbutton deletelyrics">Delete</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{$songs->links()}}
            <a href="">
                <button class="add-new-item">
                    <ion-icon name="add-outline"></ion-icon>
                    <p>Add New Song</p>
                </button>
            </a>
        </div>
    </section>
@endsection
