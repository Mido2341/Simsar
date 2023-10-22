@extends('adminlte::page')
@section('content')
<h1 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Dashboard') }}
</h1>

<h2 class="text-white bg-success"> House Sale</h2>
    <div class="row">
        @foreach ( $sales as $sale )
    <div class="col-4">

        <div class="card mb-5" style="width: 18rem;">
            <img src="{{($sale->getFirstMediaUrl('images'))}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h1 class="card-title"> Price :{{$sale->sale_price}}</h1>
              <p class="card-text">{{Str::limit($sale->sale_description, 100, '...') }}</p>
              <a href="{{route('sales.show' , $sale->id)}}" class="btn btn-primary">Detales</a>
            </div>
          </div>
    </div>
        @endforeach

    </div>

    <h2 class="text-white bg-success">House Rent</h2>

<div class="row">
    @foreach ( $rents as $rent )
    <div class="col-4">
        <div class="card mb-5" style="width: 18rem;">
            <img src="{{asset($rent->getFirstMediaUrl('rentimages'))}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h1 class="card-title"> Price :{{$rent->rent_price}}</h1>
                <p class="card-text">{{Str::limit($rent->rent_description, 50 , '.....') }}</p>
                <a href="{{route('rents.show' , $rent->id)}}" class="btn btn-primary">Detales</a>
            </div>
            </div>
        </div>
        @endforeach
    </div>


    <h2 class="text-white bg-success"> Land Sale Or Rent</h2>

    <div class="row">
        @foreach ( $lands as $land )
        <div class="col-4">

            <div class="card mb-5" style="width: 18rem;">
                <img src="{{asset($land->getFirstMediaUrl('landimages'))}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h1 class="card-title"> Price :{{$land->meter_price}}</h1>
                        <h4 class="card-title"> Space :{{$land->land_area}}</h4>
                        <p class="card-text">{{Str::limit($land->land_description, 100, '...') }}</p>
                        <a href="{{route('lands.show' , $land->id)}}" class="btn btn-primary">Detales</a>
                    </div>
                </div>
            </div>
         @endforeach
        </div>
@endsection


