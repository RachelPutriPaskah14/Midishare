@extends('layouts.layouts')

@section('content')

<div class="container" style="margin-top: 7rem;">
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-12 bg-white p-4">
            <h2 class="text-center">Edit Belajar Mandiri</h2>
            <form method="post" action="/editvid_process" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$videomod->id}}" name="id">
                <div class="form-group">
                    <label>Judul <Video></Video></label>
                    <input type="text" class="form-control" value="{{$videomod->judulvidmod}}" name="judul" placeholder="Judul Berita">
                </div>
                <div class="form-group">
                    <label>File</label>
                    <textarea name="deskripsi" class="form-control" rows="15" style="text-align: justify;">{{$videomod->dokumenvideo}}</textarea>
                </div>               
                <div class="form-group" style="margin-top: 2rem;">
                    <input type="submit" class="btn btn-primary" value="Edit">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection