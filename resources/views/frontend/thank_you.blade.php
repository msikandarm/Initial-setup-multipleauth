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
            <h1 style="margin-bottom: 35px">Thanks for buy our Product. <a href="{{route('userpdf.generate',['id' => $pdf_id])}}">Click Now to Download PDF</a></h1>

        </div>
    </div>
 </section>
@stop
