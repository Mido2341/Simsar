@extends('adminlte::page')
{{-- @section('title','Create-Doctor') --}}
@section('content')

<h1 class="alert alert-secondary">Form Rent Home</h1>

{{-- @if ($errors->any())
    <div class="alert alert-info">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<form action="{{route('rents.update',$rent->id)}}" method="POST" enctype="multipart/form-data">
    @method('put')
    @csrf

    <div class="mb-3 ">
        <label for="inputfile" class="col-sm-2 col-form-label">IMAGE :</label>
        <input type="file" value="{{$rent->rent_photo}}" class="form-control w-50" name="rent_photo[]" multiple id="inputGroupFile01">
      </div>

  <div class="mb-3">
    <label for="rent_price" class="form-label">Price :</label>
    <input type="integer" value="{{$rent->rent_price}}" class="form-control w-50" name="rent_price" id="rent_price" placeholder="50000">
  </div>

<div class="mb-3">
    <label for="rent_address" class="form-label">House Address :</label>
    <input type="text" value="{{$rent->address}}" class="form-control w-50" name="rent_address" id="rent_address" placeholder="19 street salah rentm">
  </div>

  <div class="mb-3">
    <label for="rent_city" class="form-label">City :</label>
    <input type="text" value="{{$rent->city}}" class="form-control w-50" name="rent_city" id="rent_city" placeholder="Cairo">
  </div>

<div class="mb-3">
    <label for="rent_description" class="form-label">Description :</label>
    <input type="text" value="{{$rent->rent_description}}" class="form-control w-50"  name="rent_description" id="rent_description" >
  </div>

  {{-- <div class="mb-3  ">
     <label for="password" class="col-sm-2 col-form-label">Password :</label>
     <input type="password" class="form-control w-50 "  name="password" id="password">
    </div> --}}


      {{-- <select class="custom-select w-50" aria-label="Default select example" name="major_id">
  <option selected>Select Major</option>
  @foreach ($majors as $major)
  <option  @if (old('major_id')==$major->id) selected  @endif value="{{$major->id}}">{{$major->title}}
</option>
  @endforeach
</select> --}}


<button class="btn btn-outline-info">Publish</button>
</form>

@endsection
