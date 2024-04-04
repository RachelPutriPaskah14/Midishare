@extends('layouts.layouts')

@section('content')
    <section style="margin-top: 95px;">
        <div class="container" style="margin-left: 3.5rem;">
            <h4>Repository</h4>
        </div>
    </section>
    <section  style="margin-top: 35px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <img class="card-img-top img-fluid" src="{{asset('icon/gmbr.png')}}" alt="Card image cap">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-block">
                        <img class="card-img-top img-fluid" src="{{asset('icon/gmbr3.png')}}" alt="Card image cap" style="height:15rem;">
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <img class="card-img-top img-fluid" src="{{asset('icon/gmbr4.png')}}" alt="Card image cap" style="height:15rem;">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <img class="card-img-top img-fluid" src="{{asset('icon/gmbr2.png')}}" alt="Card image cap" style="height:15rem;">
                </div>
            </div>
        </div>
    </div>
    </section>












@endsection