@extends('layouts.layouts')

@section('content')
{{-- <center style="margin-top: 95px;">
    <a href="/add"> <button class="btn btn-success">Tambah Artikel</button></a>
</center> --}}
<section style="margin-top: 90px; margin-left : 1rem;">
    <div class="container">
        <h4>News</h4>
    </div>
</section>
<section>
    <div class="container" style="margin-left :6rem; margin-top : 2rem;">
        <div class="row">
            @foreach($news as $news)
            <div class="col-md-4 mb-4"> <!-- Tambahkan kelas mb-4 di sini -->
                <div class="card">
                    <img class="card-img-top" src="{{ asset('storage/icon/' . $news->gambar) }}" alt="Card image cap">
                    <div class="card-body">
                        {{-- <h5 class="card-title"><a href="/detail/{{ $news->id }}">{{ $news->judul }}</a></h5> --}}
                        <h5 class="card-title text-dark">
                            <a href="/detail/{{ $news->id }}" style="text-decoration: none; color: black;">{{ $news->judul }}</a>
                        </h5>                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>        
    </div>
</section>

{{-- @foreach ($news as $new)
<div class="col-md-4 col-sm-12 mt-4">
    <div class="card">
        <div class="card">
            <img class="card-img-top" src="{{ asset('storage/icon/' . $new->gambar) }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $new->judul }}</h5>
                <p class="card-text">{{ $new->deskripsi }}</p>
        </div>
    </div>
</div>
@endforeach --}}

@endsection