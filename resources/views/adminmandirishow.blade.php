@extends('layouts.layouts')

@section('content')
<div style="margin-top: 7rem;">
<h2 class="text-center">List Berita</h2>
@if($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{$message}}</strong>
</div>
@endif
<div class="col-md-12 bg-white p-4">
    <a href="/addmandiri">
        <button class="btn btn-primary mb-3"><strong>+</strong>Tambah</button>
    </a>
    <table class="table table-responsive table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th width="22%">Judul</th>
                <th>Link</th>
                <th width="13%">Link</th>
                <th width="10%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mandiri as $i => $mandiri)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$mandiri->judul}}</td>
                <td>{{$mandiri->link}}</td>
                <td><img src="{{ asset('storage/icon/' . $mandiri->gambarmandiri) }}" alt="Gambar Belajar Mandiri" style="max-width: 100px;"></td>
                <td>
                    <a href="/editmandiri/{{$mandiri->id}}" class="btn btn-warning">
                        <i class="bi bi-pencil-square" style="color: azure"></i></a>
                    <a href="/deletemandiri/{{$mandiri->id}}" class="btn btn-danger"  style="color: azure"><i class="bi bi-trash"></i></a>
                </td>
            </tr>            
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
