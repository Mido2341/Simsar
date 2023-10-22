@extends('adminlte::page')
@section('content')

  <div class="card w-50 mx-auto" >
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
          </ol>
      <div class="carousel-inner">>
          @foreach ( $rent->getMedia('rentimages') as $image)

          <div class="carousel-item {{$loop->first ? 'active' : ''}}" >
              <img src="{{$image->getUrl()}}" class="d-block w-100"  alt="...">
          </div>
          @endforeach
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-custom-icon" aria-hidden="true">
          <i class="fas fa-chevron-left"></i>
          </span>
          <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-custom-icon" aria-hidden="true">
          <i class="fas fa-chevron-right"></i>
          </span>
          <span class="sr-only">Next</span>
          </a>
    </div>
  </div>


<br>

@if (auth()->id()==$rent->user_id)
<div class="text-center">
    <form action="{{route('rents.destroy', $rent->id)}}" method="POST" style="display: inline-block;" >
        @method('DELETE')
        @csrf
        <button class="btn btn-outline-dark" >Delete</button>
    </form>
     <a href="{{route('rents.edit',$rent->id)}}" style="display: inline-block;" class="btn btn-outline-success">Update</a>
</div>
@endif

<br>
<table class="table table-success table-striped" style="width: 100%">
    <tr>
        <th scope="row" style="width: 100">puplisher :</th>
        <td>{{$rent->user->first_name}}  {{$rent->user->last_name}}</td>
    </tr>
    <tr>
        <th scope="row" style="width: 100">Price </th>
        <td>{{$rent->rent_price}}</td>
    </tr>
    <tr>
        <th scope="row" style="width: 100">Phone : </th>
        <td>{{$rent->rent_num}}</td>
    </tr>
    <tr>
        <th scope="row" style="width: 100">Address</th>
        <td>{{$rent->rent_address}}</td>
    </tr>
    <tr>
        <th scope="row" style="width: 100">City </th>
        <td>{{$rent->rent_city}}</td>
    </tr>
    <tr>
        <th scope="row" style="width: 100">Description </th>
        <td>{{$rent->rent_description}}</td>
    </tr>

</table>
<label for="floatingTextarea">Comments :</label>
<livewire:comments :model="$rent"/>
@endsection

