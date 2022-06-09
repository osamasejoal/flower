@extends('backend.layouts.master')


@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">

                {{-- Page header --}}
                <div class="col-lg-12 text-center my-2">
                    <h2>Edit Testimonial</h2>
                </div>

                {{-- Form field --}}
                <div class="col-lg-10 m-auto">

                    {{-- Success alert --}}
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Form for Edit Clients testimonial --}}
                    <form action="{{ route('testimonial.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        {{-- Client Name --}}
                        <div class="mb-3 col-6 float-left pl-0">
                            <label for="name" class="form-label">Client Name *</label>
                            <input name="name" type="text" class="form-control" id="name" value="{{ $testimonial->name }}">

                            @error('name')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Client Profession --}}
                        <div class="mb-3 col-6 float-right pr-0">
                            <label for="profession" class="form-label">Client Profession *</label>
                            <input name="profession" type="text" class="form-control" id="profession"
                                value="{{ $testimonial->profession }}">

                            @error('profession')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="clearfix"></div>

                        {{-- Client Quote --}}
                        <div class="mb-3">
                            <label for="quote" class="form-label">Client Quote *</label>
                            <textarea name="quote" id="quote" class="form-control">{{ $testimonial->quote }}</textarea>

                            @error('quote')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Previous Image --}}
                        <div class="mb-3">
                            <label for="preimg" class="form-label">Previous Image</label>
                            <img src="{{asset('backend/assets/images/testimonial/' . $testimonial->image)}}" alt="Image not found" width="100px">
                        </div>

                        {{-- Client Image --}}
                        <div class="mb-5">
                            <label for="image" class="form-label">Choose new Image *</label>
                            <input name="image" type="file" id="image" class="form-control">

                            @if ($errors->get('image'))
                                @error('image')
                                    <span class="text-danger text-center">{{ $message }}</span>
                                @enderror
                            @else
                                <span class="text-muted">Please choose 100 * 100 resolution image, otherwise it will be resize.</span>
                            @endif
                        </div>


                        <button type="submit" class="btn btn-lg btn-primary d-block m-auto">Update Testimonial</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
