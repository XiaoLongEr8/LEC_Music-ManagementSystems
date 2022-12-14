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

                {{-- tr dibawah nnti pake foreach --}}
                <tr>
                    <td>1</td>
                    <td>Bitterlove</td>
                    <td>Ardhito Pramono</td>
                    <td>2.652</td>
                    <td>12/10/2019</td>
                    <td>
                        <a href="">
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
            </table>

            <a href="">
                <button class="add-new-item">
                    <ion-icon name="add-outline"></ion-icon>
                    <p>Add new Artist</p>
                </button>
            </a>
        </div>
    </section>
@endsection
