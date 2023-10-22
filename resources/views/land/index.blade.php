@extends('adminlte::page')
@section('content')

<h1 class="text-warning bg-success"> Land Sale Or Rent</h1>
<br>
<div class="row">
    @foreach ( $lands as $land )
        <div class="col-4">
            <div class="card mb-5" style="width: 18rem;">
                <img src="{{asset($land->getFirstMediaUrl('landimages'))}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h1 class="card-title"> Price :{{$land->meter_price}}</h1>
                    <h4 class="card-title"> Space :{{$land->land_area}}</h4>
                    <p class="card-text">{{Str::limit($land->land_description, 100, '...') }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{route('lands.show' , $land->id)}}" class="btn btn-primary mr-5">Detales</a>
                            @if ($land->lived(auth()->user()))
                            <a href="{{route('live' , $land->id)}}" class="btn btn-danger">
                                <i class="fas fa-heart"></i>
                            </a>
                            @else
                            <a href="{{route('live' , $land->id)}}" class="btn btn-primary">
                                <i class="fas fa-heart"></i>
                            </a>
                            @endif
                      </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
{{$lands->links()}}
@endsection
