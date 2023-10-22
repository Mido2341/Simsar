@extends('adminlte::page')
@section('content')

<h1 class="test-center alert alert-secondary">My Favorite</h1>

<div class="row">
    <div class="col-4">
    @foreach ( $sales as $sale )
    @if ($sale->liked(auth()->user()))
    <div class="card mb-5" style="width: 18rem;">
        <img src="{{($sale->getFirstMediaUrl('images'))}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h2> Price :{{$sale->sale_price}}</h2>
          <p class="card-text">{{Str::limit($sale->sale_description, 100, '...') }}</p>
         <div class="d-flex justify-content-between align-items-center">
            <a href="{{route('sales.show' , $sale->id)}}" class="btn btn-primary mr-5">Detales</a>
            <a href="{{route('like' , $sale->id)}}" class="btn btn-danger">
                <i class="fas fa-heart"></i>
            </a>

        </div>
    </div>
</div>
@endif
@endforeach
        @foreach ( $rents as $rent )
        @if ($rent->loved(auth()->user()))
        <div class="card mb-5" style="width: 18rem;">
            <img src="{{($rent->getFirstMediaUrl('images'))}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h2> Price :{{$rent->rent_price}}</h2>
                <p class="card-text">{{Str::limit($rent->rent_description, 100, '...') }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{route('rents.show' , $rent->id)}}" class="btn btn-primary mr-5">Detales</a>
                    <a href="{{route('love' , $rent->id)}}" class="btn btn-danger">
                        <i class="fas fa-heart"></i>
                    </a>
                </div>
    </div>
</div>
@endif
@endforeach

@foreach ( $lands as $land )
@if ($land->lived(auth()->user()))
            <div class="card mb-5" style="width: 18rem;">
                <img src="{{asset($land->getFirstMediaUrl('landimages'))}}" class="card-img-top" alt="...">
                <div class="card-body">
                <h2> Price :{{$land->meter_price}}</h2>
                <h4 >Space :{{$land->land_area}}</h4>
                <p class="card-text">{{Str::limit($land->land_description, 100, '...') }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{route('lands.show' , $land->id)}}" class="btn btn-primary mr-5">Detales</a>
                        <a href="{{route('live' , $land->id)}}" class="btn btn-danger">
                            <i class="fas fa-heart"></i>
                        </a>
    @endif
                    </div>
            </div>
    </div>
@endforeach
</div>
</div>
@endsection
