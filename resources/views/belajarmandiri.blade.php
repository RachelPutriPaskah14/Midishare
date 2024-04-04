{{-- @extends('layouts.layouts')

@section('content')
<section style="margin-top: 90px; margin-left : 1rem;">
    <div class="container">
        <h4>Belajar Mandiri</h4>
    </div>
</section>
<section>
    <div class="container" style="margin-left :6rem; margin-top : 2rem;">
        <div class="row">
            @foreach($mandiri as $mandiri)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('storage/icon/' . $mandiri->gambarmandiri) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-dark">
                            <a href="/detailmandiri/{{ $mandiri->id }}" style="text-decoration: none; color: black;">{{ $mandiri->judul }}</a>
                        </h5>                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>        
    </div>
</section>
@endsection --}}

@extends('layouts.layouts')

@section('content')
<section style="margin-top: 90px; margin-left : 1rem;">
    <div class="container">
        <h4>Belajar Mandiri</h4>
    </div>
</section>
<section>
    <div class="container" style="margin-left :6rem; margin-top : 2rem;">
        <div class="row">
            @foreach($mandiri as $mandiri)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('storage/icon/' . $mandiri->gambarmandiri) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-dark">
                            <a href="{{ $mandiri->link }}" style="text-decoration: none; color: black;" target="_blank">{{ $mandiri->judul }}</a>
                        </h5>                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>        
    </div>
</section>
@endsection

