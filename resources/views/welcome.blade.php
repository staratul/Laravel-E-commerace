@extends('layouts.app')

@section('content')

@include('layouts.image_slider')

<div class="container-fluid">
    <div class="row">
        @for($i = 0; $i < 16; $i++)
            <div class="col-md-3 py-3">
                <div class="card">
                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title"><a>Card title</a></h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                            content.</p>
                        <a href="#" class="btn btn-primary">Button</a>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>

@endsection
