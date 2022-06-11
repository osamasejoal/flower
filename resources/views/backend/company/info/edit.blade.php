@extends('backend.layouts.master')


@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">

                {{-- Page header --}}
                <div class="col-lg-12 text-center my-2">
                    <h2>Company Info</h2>
                </div>

                {{-- Form field --}}
                <div class="col-lg-10 m-auto">

                    {{-- Success alert --}}
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Form for Edit Company Info --}}
                    <form class="row g-3 mb-5" action="{{ route('info.update', $c_info->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        {{-- Company Name --}}
                        <div class="mb-3 col-6">
                            <label for="name" class="form-label">Company Name *</label>
                            <input name="name" type="text" class="form-control" id="name" value="{{ $c_info->name }}">

                            @error('name')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Title --}}
                        <div class="mb-3 col-6">
                            <label for="title" class="form-label">Title *</label>
                            <input name="title" type="text" class="form-control" id="title"
                                value="{{ $c_info->title }}">

                            @error('title')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Phone number --}}
                        <div class="mb-3 col-6">
                            <label for="phone" class="form-label">Phone number *</label>
                            <input name="phone" type="text" class="form-control" id="phone"
                                value="{{ $c_info->phone }}">

                            @error('phone')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Call time --}}
                        <div class="mb-3 col-6">
                            <label for="call_time" class="form-label">Call time *</label>
                            <input name="call_time" type="text" class="form-control" id="call_time"
                                value="{{ $c_info->call_time }}">

                            @if ($errors->get('logo'))
                                @error('call_time')
                                    <span class="text-danger text-center">{{ $message }}</span>
                                @enderror
                            @else
                                <span class="text-muted">When viewers can call you</span>
                            @endif
                        </div>

                        {{-- City --}}
                        <div class="mb-3 col-3">
                            <label for="city" class="form-label">City *</label>
                            <input name="city" type="text" class="form-control" id="city" value="{{ $c_info->city }}">

                            @error('city')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Country --}}
                        <div class="col-3">
                            <label for="country" class="form-label">Country *</label>
                            <input name="country" type="text" class="form-control" id="country"
                                value="{{ $c_info->country }}">

                            @error('country')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Location --}}
                        <div class="col-6">
                            <label for="location" class="form-label">Location *</label>
                            <input name="location" type="text" class="form-control" id="location"
                                value="{{ $c_info->location }}">

                            @error('location')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div class="mb-3 col-12">
                            <label for="description" class="form-label">Description *</label>
                            <textarea name="description" id="description" class="form-control">{{ $c_info->description }}</textarea>

                            @error('description')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Previous Logo --}}
                        <div class="mb-3 col-12">
                            <label for="prelogo" class="form-label">Previous Logo</label>
                            <img src="{{ asset('backend/assets/images/company-info/' . $c_info->logo) }}"
                                alt="Image not found" width="130px">
                        </div>

                        {{-- Company Logo --}}
                        <div class="mb-5 col-12">
                            <label for="logo" class="form-label">Choose new Logo</label>
                            <input name="logo" id="logo" type="file" class="form-control">

                            @if ($errors->get('logo'))
                                @error('logo')
                                    <span class="text-danger text-center">{{ $message }}</span>
                                @enderror
                            @else
                                <span class="text-muted">Please choose 130 * 50 ratio logo, otherwise it will be
                                    resize.</span>
                            @endif
                        </div>


                        <button type="submit" class="btn btn-lg btn-primary d-block m-auto">Update Company Info</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
