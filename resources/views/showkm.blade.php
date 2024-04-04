{{-- @extends('layouts.layouts')

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
    <a href="/addkm">
        <button class="btn btn-primary mb-3"><strong>+</strong>Tambah</button>
    </a>
    <table class="table table-responsive table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th width="22%">Judul</th>
                <th>File Dokumen</th>
                <th width="13%">File Dokumen</th>
                <th width="10%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($repositorykm as $i => $repositorykm)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$repositorykm->judul}}</td>
                <td>{{$repositorykm->dokumenfile}}</td>
                <td>
                    <a href="/editmandiri/{{$repositorykm->id}}" class="btn btn-warning">
                        <i class="bi bi-pencil-square" style="color: azure"></i></a>
                    <a href="/deletemandiri/{{$repositorykm->id}}" class="btn btn-danger"  style="color: azure"><i class="bi bi-trash"></i></a>
                </td>
            </tr>            
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection --}}

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
    <a href="{{ route('knowledge.addmandiri') }}">
        <button class="btn btn-primary mb-3"><strong>+</strong>Tambah</button>
    </a>
    <table class="table table-responsive table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th  width="1%">No.</th>
                <th width="22%">Judul</th>
                {{-- <th>File Dokumen</th> --}}
                <th width="13%">File Dokumen</th>
                <th width="10%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($repositorykm as $i => $repositorykm)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$repositorykm->judul}}</td>
                <td>
                    @if (pathinfo($repositorykm->dokumenfile, PATHINFO_EXTENSION) == 'pdf')
                        <a href="{{ asset('storage/dokumen/' . $repositorykm->dokumenfile) }}" target="_blank">Lihat PDF</a>
                    @elseif (in_array(pathinfo($repositorykm->dokumenfile, PATHINFO_EXTENSION), ['doc', 'docx']))
                        <a href="{{ asset('storage/dokumen/' . $repositorykm->dokumenfile) }}" target="_blank">Unduh DOC</a>
                    @elseif (in_array(pathinfo($repositorykm->dokumenfile, PATHINFO_EXTENSION), ['ppt', 'pptx']))
                        <a href="{{ asset('storage/dokumen/' . $repositorykm->dokumenfile) }}" target="_blank">Lihat PPT</a>
                    @else
                        <span>Format tidak didukung</span>
                    @endif
                </td>
                <td>
                    <a href="/editkm/{{$repositorykm->id}} " class="btn btn-warning">
                        <i class="bi bi-pencil-square" style="color: azure"></i></a>
                    <a href="/deletekm/{{$repositorykm->id}}" class="btn btn-danger"  style="color: azure"><i class="bi bi-trash"></i></a>
                </td>
            </tr>            
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection

