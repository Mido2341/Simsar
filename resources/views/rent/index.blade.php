@extends('adminlte::page')
@section('content')
<h1 class="test-center alert alert-secondary"> House Rent</h1>


<div class="row">
    @foreach ( $rents as $rent )
<div class="col-4">
    <div class="card mb-5" style="width: 18rem;">
        <img src="{{asset($rent->getFirstMediaUrl('rentimages'))}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h1 class="card-title"> Price :{{$rent->rent_price}}</h1>
          <p class="card-text">{{Str::limit($rent->rent_description, 50 , '.....') }}</p>
          <div class="d-flex justify-content-between align-items-center">
                <a href="{{route('rents.show' , $rent->id)}}" class="btn btn-primary mr-5">Detales</a>
                @if ($rent->loved(auth()->user()))
                    <a href="{{route('love',$rent->id)}}" class="btn btn-danger">
                        <i class="fas fa-heart"></i>
                    </a>
                    @else
                    <a href="{{route('love' , $rent->id)}}" class="btn btn-primary">
                        <i class="fas fa-heart"></i>
                    </a>
                    @endif
            </div>
        </div>
      </div>
</div>
@endforeach
</div>
{{$rents->links()}}
@endsection
