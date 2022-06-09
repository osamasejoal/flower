@extends('backend.layouts.master')


@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">

                {{-- Page header --}}
                <div class="col-lg-12 text-center my-2">
                    <h2>Edit FAQ</h2>
                </div>

                {{-- Form field --}}
                <div class="col-lg-10 m-auto">

                    {{-- Success alert --}}
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Form for edit FAQ --}}
                    <form action="{{ route('faq.update', $faq->id) }}" method="POST">
                        @method('put')
                        @csrf

                        {{-- FAQ Question --}}
                        <div class="mb-3">
                            <label for="question" class="form-label">FAQ Question *</label>
                            <input name="question" type="text" class="form-control" id="question" value="{{$faq->question}}">

                            @error('question')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- FAQ Answer --}}
                        <div class="mb-3">
                            <label for="answer" class="form-label">FAQ Answer *</label>
                            <textarea name="answer" id="answer" rows="5" class="form-control">{{$faq->answer}}</textarea>

                            @error('answer')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-lg btn-primary d-block m-auto">Update FAQ</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
