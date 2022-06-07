@extends('backend.layouts.master')


@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">

                {{-- Page header --}}
                <div class="col-lg-12 text-center my-2">
                    <h2>Add Company</h2>
                </div>

                {{-- Form field --}}
                <div class="col-lg-10 m-auto">

                    {{-- Success alert --}}
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Form for add Trusted By Companies Update --}}
                    <form action="{{ route('tbc.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Company Name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Company Name *</label>
                            <input name="name" type="text" class="form-control" id="name" value="{{old('name')}}">

                            @error('name')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Company Link --}}
                        <div class="mb-3">
                            <label for="link" class="form-label">Company Link *</label>
                            <input name="link" type="url" class="form-control" id="link" value="{{old('link')}}">

                            @error('link')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Company Logo --}}
                        <div class="mb-5">
                            <label for="logo" class="form-label">Company Logo *</label>
                            <input name="logo" type="file" id="logo" class="d-block">

                            @if ($errors->get('logo'))
                                @error('logo')
                                    <span class="text-danger text-center">{{ $message }}</span>
                                @enderror
                            @else
                                <span class="text-muted">Image should be a png file and transparent background.</span>
                            @endif

                        </div>


                        <button type="submit" class="btn btn-lg btn-primary d-block m-auto">Add Company</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
