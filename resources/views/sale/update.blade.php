@extends('adminlte::page')
{{-- @section('title','Create-Doctor') --}}
@section('content')

<h1 class="alert alert-secondary">Form To Update Sale Home</h1>

@if ($errors->any())
    <div class="alert alert-info">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('sales.update',$sale->id)}}" method="POST" enctype="multipart/form-data">
    @method('put')
    @csrf

    <div class="mb-3 ">
        <label for="sale_photo" class="col-sm-2 col-form-label">IMAGE :</label>
        <input type="file" value="{{$sale->sale_photo}}" class="form-control w-50" name="sale_photo[]" multiple id="sale_photo">
      </div>

  <div class="mb-3">
    <label for="sale_price" class="form-label">Price :</label>
    <input type="integer" value="{{$sale->sale_price}}" class="form-control w-50" name="sale_price" id="sale_price" placeholder="50000">
  </div>

<div class="mb-3">
    <label for="sale_address" class="form-label">House Address :</label>
    <input type="text" value="{{$sale->sale_address}}" class="form-control w-50" name="sale_address" id="sale_address" placeholder="19 street salah salem">
  </div>

  <div class="mb-3">
    <label for="sale_city" class="form-label">City :</label>
    <input type="text" value="{{$sale->sale_city}}" class="form-control w-50" name="sale_city" id="sale_city" placeholder="Cairo">
  </div>

<div class="mb-3">
    <label for="sale_description" class="form-label">Description :</label>
    <input type="text" value="{{$sale->sale_description}}" class="form-control w-50"  name="sale_description" id="sale_description" >
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
