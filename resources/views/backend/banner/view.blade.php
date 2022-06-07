@extends('backend.layouts.master')

@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12 text-center my-2">
                    <h2>Banner</h2>
                </div>



                <div class="col-lg-10 m-auto">

                    {{-- Success alert --}}
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{session('success')}}
                        </div>
                    @endif

                    {{-- Form for Banner Update --}}
                    <form action="{{ route('banner.update', $banner->id) }}" method="POST">
                        @method('put')
                        @csrf

                        {{-- Title --}}
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input name="title" type="text" class="form-control" id="title" value="{{ $banner->title }}">
                            @error('title')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div class="mb-5">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" rows="7"
                                style="min-width:100%;border-color:rgba(197,214,222,.7);padding:0.375rem 0.75rem;">{{ $banner->description }}</textarea>
                            @error('description')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-lg btn-primary d-block m-auto">Update Banner</button>
                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection
