@extends('layouts.layouts')

@section('content')
<section style="margin-top: 95px;">
    <div class="container" style="margin-left: 5rem;">
        <h4>Add Video Pembelajaran Mod</h4>
    </div>
</section>

<section>
    <div class="col-md-8 col-sm-12 bg-white p-4">
        <div class="container" style="margin-left: 3.5rem;">
            <form method="post" action="/addvidmod_process" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Judul Video Mod</label>
                    <input type="text" class="form-control" name="judulvidmod" placeholder="Judul artikel">
                </div>
                <br>
                <div class="form-group">
                    <label>Dokumen Video</label>
                    <input type="file" class="form-control" name="dokumenvideo" placeholder="dokumen file">
                </div>
        </div>
    </div>
    <div class="col-md-3 ml-md-5 col-sm-12 bg-white p-4" style="height: 100px !important">
        <div class="container" style="margin-left: 3.5rem;">
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-sm-6" value="+ Upload">
            </div>
        </div>
    </div>    
    </form>
</section>
@endsection