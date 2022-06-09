@extends('backend.layouts.master')


@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">

                {{-- Page header --}}
                <div class="col-lg-12 text-center my-2">
                    <h2>Add Service</h2>
                </div>

                {{-- Form field --}}
                <div class="col-lg-10 m-auto">

                    {{-- Success alert --}}
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Form for add services --}}
                    <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Service Name --}}
                        <div class="mb-3 col-6 float-left pl-0">
                            <label for="name" class="form-label">Service Name *</label>
                            <input name="name" type="text" class="form-control" id="name" value="{{old('name')}}">

                            @error('name')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Service Icon --}}
                        <div class="mb-3 col-6 float-right pr-0">
                            <label for="icon" class="form-label">Service Icon *</label>
                            <input name="icon" type="text" class="form-control" id="icon" value="{{old('icon')}}" placeholder="e.g. fas fa-code">
                            
                            @if ($errors->get('icon'))
                                @error('icon')
                                    <span class="text-danger text-center">{{ $message }}</span>
                                @enderror
                            @else
                                <span class="text-muted">You can choose any icon from Font Awesome 5.</span>
                            @endif
                        </div>

                        <div class="clearfix"></div>

                        {{-- Short Description --}}
                        <div class="mb-3">
                            <label for="short_desc" class="form-label">Short Description *</label>
                            <textarea name="short_desc" id="short_desc" rows="4" class="w-100" style="padding:0.375rem 0.75rem;border:solid 1px rgba(197,214,222,.7)">{{old('short_desc')}}</textarea>

                            @if ($errors->get('short_desc'))
                                @error('short_desc')
                                    <span class="text-danger text-center">{{ $message }}</span>
                                @enderror
                            @else
                                <span class="text-muted">Write the short description in 25 to 50 words.</span>
                            @endif
                        </div>

                        {{-- Long Description --}}
                        <div class="mb-3">
                            <label for="long_desc" class="form-label">Long Description *</label>
                            <textarea name="long_desc" id="long_desc" rows="10" class="w-100" style="padding:0.375rem 0.75rem;border:solid 1px rgba(197,214,222,.7)">{{old('long_desc')}}</textarea>

                            @if ($errors->get('long_desc'))
                                @error('long_desc')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                            @else
                                <span class="text-muted">Write the long description in 100 to 250 words.</span>
                            @endif
                        </div>

                        {{-- Service Image --}}
                        <div class="mb-5">
                            <label for="image" class="form-label">Service Image *</label>
                            <input name="image" type="file" id="image" value="" class="d-block">

                            @if ($errors->get('image'))
                                @error('image')
                                    <span class="text-danger text-center">{{ $message }}</span>
                                @enderror
                            @else
                                <span class="text-muted">Image should be a png file.</span>
                            @endif

                        </div>


                        <button type="submit" class="btn btn-lg btn-primary d-block m-auto">Add Service</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
