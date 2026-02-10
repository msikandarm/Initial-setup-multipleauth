@extends('frontend.layouts.welcome')

@section('content')
<div class="row banner mb-5">
    <div class="col-sm-12 text-center">
     <a href="{{route('dashboard')}}"> <img src="{{asset('assets/backend/images/MBC_LOGO_BLACK_NBG.png')}}" alt="logo" style="width: 5%"></a>
    </div>
 </div>
<div class="container">

    <div class="row mt-2">
            <section id="counts" class="counts">
                <div class="container" data-aos="fade-up">

                  <div class="row no-gutters">
                    <div class="col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start" data-aos="fade-right" data-aos-delay="100">
                        @if ($product->image)
                        <img src="{{ url('storage/media/productImage/'.$product->image) }}" class="card-img-top" alt="{{$product->image}}">
                        @else
                        <img src="{{asset('assets/backend/images/placeholder.jpg')}}" class="card-img-top" alt="placholder">
                        @endif
                    </div>
                    <div class="col-xl-7 ps-4 ps-lg-5 pe-4 pe-lg-1  align-items-stretch" data-aos="fade-left" data-aos-delay="100">
                      <div class="content">
                        <h3>{{$product->title}}</h3>
                        {{-- <p>
                            {!!  Str::words($product->description, 80,'...') !!}
                        </p> --}}

                      </div><!-- End .content-->
                      <div class="row">
                        <div class="col-sm-12">
                         <form action="{{route('pdf.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                             <div class="mb-3">
                               <label for="name" class="form-label">Name</label>
                               <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" required>
                             </div>
                             <div class="mb-3">
                                 <label for="exampleInputEmail1" class="form-label">Email address</label>
                                 <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" required>
                               </div>
                             <div class="mb-3">
                                 <label for="phone" class="form-label">Phone</label>
                                 <input type="number" name="phone"  class="form-control" id="phone" placeholder="Enter Phone No" required>
                               </div>
                               <div class="mb-3">
                                 <label for="link" class="form-label">Links</label>
                                 <input type="text" name="link" class="form-control" id="link" placeholder="Enter Links" required>
                               </div>
                             <button type="submit" class="btn btn-primary">Buy Now</button>
                           </form>
                        </div>
                     </div>
                    </div>
                  </div>

                </div>
              </section>

    </div>
</div>
@stop
