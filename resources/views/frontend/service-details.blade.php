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
                <h2 class="text-center" style="color: #A9A9A9;font-size:45px">/ Web Development</h2>
            </div>

            {{-- Main Section --}}
            <div class="main-section my-5 col-lg-10 mx-auto">


                <div class="top-part row mb-5">
                    <div class="name-side col-6 d-flex" style="border-right:5px solid #778899">
                        <h1 class="m-auto" style="font-size:55px;color:#2F4F4F">Web Development</h1>
                    </div>
                    <div class="image-side col-6 d-flex">
                        <img class="m-auto" src="{{ asset('frontend/images/services/service-1.png') }}" alt="" style="max-width:400px;">
                    </div>
                </div>

                <div class="main-part">
                    <p style="font-size:25px;line-height:1.7;letter-spacing:1px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint quo, sunt consequuntur saepe, nam non
                    cupiditate sit architecto quasi blanditiis sequi libero eveniet pariatur, quod quaerat et. Illo
                    reiciendis amet laborum consequuntur natus totam ad quam corrupti doloribus optio error nobis impedit
                    accusamus explicabo provident vel, unde velit autem nam? Neque eaque doloribus itaque pariatur optio
                    molestias architecto, magni necessitatibus unde consequatur id! Illo voluptatibus ratione enim. Ipsam
                    neque tempore ad omnis hic! Amet fugiat sed delectus cupiditate quos veniam voluptatem possimus deserunt
                    voluptates aspernatur, officiis a, libero labore accusantium quam cumque animi debitis molestias
                    doloremque magni! Doloremque incidunt odit nesciunt beatae nihil earum saepe, pariatur accusamus facere
                    sapiente aspernatur, iure repellendus quam qui corrupti. Excepturi cumque asperiores ea vero? am rem similique aut harum culpa.</p>
                </div>

                

            </div>


        </div>
    </div>
@endsection
