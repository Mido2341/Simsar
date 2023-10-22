@extends('adminlte::page')
@section('content')

<h1 class="test-center alert alert-secondary"> House Sale</h1>

<div class="row">
    @foreach ( $sales as $sale )
<div class="col-4">

    <div class="card mb-5" style="width: 18rem;">
        <img src="{{($sale->getFirstMediaUrl('images'))}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h1 class="card-title"> Price :{{$sale->sale_price}}</h1>
          <p class="card-text">{{Str::limit($sale->sale_description, 100, '...') }}</p>
         <div class="d-flex justify-content-between align-items-center">
                <a href="{{route('sales.show' , $sale->id)}}" class="btn btn-primary mr-5">Detales</a>
                @if ($sale->liked(auth()->user()))
                <a href="{{route('like' , $sale->id)}}" class="btn btn-danger">
                    <i class="fas fa-heart"></i>
                </a>
                @else
                <a href="{{route('like' , $sale->id)}}" class="btn btn-primary">
                    <i class="fas fa-heart"></i>
                </a>
                @endif
          </div>
        </div>
      </div>
</div>
@endforeach
</div>
{{$sales->links()}}
@endsection
