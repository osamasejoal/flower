@extends('backend.layouts.master')


@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">

                {{-- Page header --}}
                <div class="col-lg-12 text-center my-2">
                    <h2>Add Porject</h2>
                </div>

                {{-- Form field --}}
                <div class="col-lg-10 m-auto">

                    {{-- Success alert --}}
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Form for add Portfolio --}}
                    <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Project Type --}}
                        <div class="mb-3">
                            <label for="type" class="form-label">Project Type *</label>
                            <input name="type" type="text" class="form-control" id="type" value="{{old('type')}}">

                            @error('type')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Project Name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Project Name *</label>
                            <input name="name" type="text" class="form-control" id="name" value="{{old('name')}}">

                            @error('name')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Project Link --}}
                        <div class="mb-3">
                            <label for="link" class="form-label">Project Link *</label>
                            <input name="link" type="url" class="form-control" id="link" value="{{old('link')}}">

                            @error('link')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Project Image --}}
                        <div class="mb-3">
                            <label for="image" class="form-label">Project Image *</label>
                            <input name="image" type="file" class="form-control" id="image" value="{{old('image')}}">

                            @error('image')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-lg btn-primary d-block m-auto">Add Project</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
