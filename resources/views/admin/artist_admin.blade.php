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
                    <th class="col-artist-3">Birthday</th>
                    <th class="col-artist-4">Nationality</th>
                    <th class="col-artist-5">Edit</th>
                    <th class="col-artist-6">Delete</th>
                </tr>

                {{-- tr dibawah nnti pake foreach --}}
                <tr>
                    <td>1</td>
                    <td>Ardhito Pramono</td>
                    <td>12/10/2019</td>
                    <td>Indonesian</td>
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
                    <p>Add New Artist</p>
                </button>
            </a>
        </div>
    </section>
@endsection
