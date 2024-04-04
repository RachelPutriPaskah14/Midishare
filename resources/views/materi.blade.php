@extends('layouts.layouts')

@section('content')
<section style="margin-top: 90px; margin-left : 1rem;">
    <div class="container">
        <h4>Materi</h4>
    </div>
</section>
<section>
    <div class="container" style="margin-left :6rem; margin-top : 2rem;">
            <p><a class="link-opacity-75" href="{{ route('knowledge.showkm') }}">Materi Dokumen</a></p>
            <p><a class="link-opacity-100" href="{{ route('video.showvideomod') }}">Video</a></p>
        </div>        
    </div>
</section>
<section>
</section>
@endsection