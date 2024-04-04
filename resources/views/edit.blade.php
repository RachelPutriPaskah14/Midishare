@extends('layouts.layouts')

@section('content')

<div class="container" style="margin-top: 7rem;">
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-12 bg-white p-4">
            <h2 class="text-center">Edit Artikel</h2>
            <form method="post" action="/edit_process" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$news->id}}" name="id">
                <div class="form-group">
                    <label>Judul News</label>
                    <input type="text" class="form-control" value="{{$news->judul}}" name="judul" placeholder="Judul Berita">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="15" style="text-align: justify;">{{$news->deskripsi}}</textarea>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                    {{-- @if($news->gambar)
                        <img src="{{ asset('storage/icon/') }}" alt="Gambar Berita" style="max-width: 100px;">
                    @else
                        <p>Gambar tidak tersedia</p>
                    @endif --}}
                </div>               
                <div class="form-group" style="margin-top: 2rem;">
                    <input type="submit" class="btn btn-primary" value="Edit">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection