@extends('backend.layouts.master')


@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">

                {{-- Page header --}}
                <div class="col-lg-12 text-center my-2">
                    <h2>Edit Porject</h2>
                </div>

                {{-- Form field --}}
                <div class="col-lg-10 m-auto">

                    {{-- Success alert --}}
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Form for edit Portfolio --}}
                    <form action="{{ route('portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        {{-- Project Type --}}
                        <div class="mb-3">
                            <label for="type" class="form-label">Project Type *</label>
                            <input name="type" type="text" class="form-control" id="type" value="{{ $portfolio->type }}">

                            @error('type')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Project Name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Project Name *</label>
                            <input name="name" type="text" class="form-control" id="name" value="{{$portfolio->name}}">

                            @error('name')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Project Link --}}
                        <div class="mb-3">
                            <label for="link" class="form-label">Project Link *</label>
                            <input name="link" type="url" class="form-control" id="link" value="{{$portfolio->link}}">

                            @error('link')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Previous Image --}}
                        <div class="mb-3 mt-5">
                            <label for="preimg" class="form-label">Previous Image</label>
                            <img id="preimg" src="{{asset('backend/assets/images/portfolio/' . $portfolio->image)}}" alt="" width="200px">
                        </div>

                        {{-- Project Image --}}
                        <div class="mb-3">
                            <label for="image" class="form-label">Choose New Image</label>
                            <input name="image" type="file" class="form-control" id="image">

                            @error('image')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-lg btn-primary d-block m-auto">Update Project</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
