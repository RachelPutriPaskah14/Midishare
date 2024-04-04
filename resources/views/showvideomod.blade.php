@extends('layouts.layouts')

@section('content')
<div style="margin-top: 7rem;">
<h2 class="text-center">List Repository</h2>
@if($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{$message}}</strong>
</div>
@endif
<div class="col-md-12 bg-white p-4">
    <a href="{{ route('video.addvidmod') }}">
        <button class="btn btn-primary mb-3"><strong>+</strong>Tambah</button>
    </a>
    <table class="table table-responsive table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th  width="1%">No.</th>
                <th width="22%">Judul</th>
                {{-- <th>File Dokumen</th> --}}
                <th width="13%">Video</th>
                <th width="10%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($videomod as $i => $videomod)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$videomod->judulvidmod}}</td>
                <td>
                    @if (pathinfo($videomod->dokumenvideo, PATHINFO_EXTENSION) == 'mp4')
                        <a href="{{ asset('storage/dokumen/' . $videomod->dokumenvideo) }}" target="_blank">Lihat Video</a>
                    @else
                        <span>Format tidak didukung</span>
                    @endif
                </td>
                <td>
                    <a href="/editvidmod/{{$videomod->id}} " class="btn btn-warning">
                        <i class="bi bi-pencil-square" style="color: azure"></i></a>
                    <a href="/deletevidmod/{{$videomod->id}}" class="btn btn-danger"  style="color: azure"><i class="bi bi-trash"></i></a>
                </td>
            </tr>            
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection

