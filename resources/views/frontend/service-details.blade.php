@extends('frontend.layouts.master')

@section('main-content')
    <div class="container-fluid">
        <div class="row">

            {{-- Top Section --}}
            <div class="top-section d-flex justify-content-center flex-column"
                style="min-height:40vh;padding-top:5rem;background-image:linear-gradient(to right, #0f0c29, #302b63, #24243e);">

                {{-- Page Name --}}
                <h1 class="text-center" style="color: #FFFAF0;font-size:70px">Service</h1>

                {{-- Service Name --}}
                <h2 class="text-center" style="color: #A9A9A9;font-size:45px">/ {{ $service->name }}</h2>
            </div>

            {{-- Main Section --}}
            <div class="main-section my-5 col-lg-10 mx-auto">


                <div class="top-part row mb-5">

                    {{-- Service Name --}}
                    <div class="name-side col-6 d-flex" style="border-right:5px solid #778899">
                        <h1 class="m-auto" style="font-size:55px;color:#2F4F4F">{{ $service->name }}</h1>
                    </div>

                    {{-- Service Image --}}
                    <div class="image-side col-6 d-flex">
                        <img class="m-auto" src="{{ asset('backend/assets/images/service/' . $service->image) }}" alt="" style="max-width:400px;">
                    </div>
                </div>

                <div class="main-part">
                    <p style="font-size:25px;line-height:1.7;letter-spacing:1px;">{{ $service->long_desc }}</p>
                </div>

                

            </div>


        </div>
    </div>
@endsection
