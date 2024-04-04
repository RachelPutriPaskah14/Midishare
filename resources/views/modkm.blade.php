@extends('layouts.layouts')

@section('content')
<section style="margin-top: 90px; margin-left : 1rem;">
    <div class="container">
        <h4>Mod KM</h4>
    </div>
</section>
<section>
    <div class="container" style="margin-left :6rem; margin-top : 2rem;">
            @foreach($videomod as $videomod)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-dark">
                            <a href="{{ asset('storage/dokumen/' . $videomod->dokumenvideo) }}" target="_blank">{{ $videomod->judulvidmod }}</a>
                        </h5>                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>        
    </div>
</section>
<section>
</section>
@endsection
