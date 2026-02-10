@extends('frontend.layouts.welcome')

@section('content')
@push('header')
<style>
    @media (min-width:1200px){
  .cat_section {min-height: 370px;}
   }
   .card img{
    height: 210px;
    object-fit: cover;
   }
</style>
@endpush

<div class="row banner mb-5">
    <div class="col-sm-12 text-center">
     <a href="{{route('dashboard')}}"> <img src="{{asset('assets/backend/images/MBC_LOGO_BLACK_NBG.png')}}" alt="logo" style="width: 5%"></a>
    </div>
 </div>
 <section class="cat_section" >
    <div class="container">
        <div class="row mt-2 text-center">
            <h1 style="margin-bottom: 35px">Products</h1>
            @foreach ($products as $product)
            <div class="col-sm-3 mb-5">
                <div class="card" style="width: 18rem;">
                    @if ($product->image)
                    <img src="{{ url('storage/media/productImage/'.$product->image) }}" class="card-img-top" alt="{{$product->image}}">
                    @else
                    <img src="{{asset('assets/backend/images/placeholder.jpg')}}" class="card-img-top" alt="placholder">
                    @endif

                    <div class="card-body">
                    <h5 class="card-title">{{$product->title}}</h5>
                    <a href="{{route('product.view',['id' => $product->slug ])}}" class="btn btn-outline-primary">View</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
 </section>
@stop
