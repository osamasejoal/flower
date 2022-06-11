@extends('backend.layouts.master')


@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">

                {{-- Page header --}}
                <div class="col-lg-12 text-center my-2">
                    <h2>Add Social Media</h2>
                </div>

                {{-- Form field --}}
                <div class="col-lg-10 m-auto">

                    {{-- Success alert --}}
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Form for add Company Social --}}
                    <form class="row" action="{{ route('social.store') }}" method="POST">
                        @csrf

                        {{-- Social Media Icon --}}
                        <div class="mb-3 col-6">
                            <label for="icon" class="form-label"> Select Social Media *</label>

                            <select style="font-size:20px" class="form-control" name="icon" id="icon">
                                <option value="">-- Social Media--</option>
                                <option value="fab fa-facebook" {{  old('icon') == "fab fa-facebook" ? 'selected' : '' }}> Facebook </option>
                                <option value="fab fa-twitter" {{  old('icon') == "fab fa-twitter" ? 'selected' : '' }}> Twitter </option>
                                <option value="fab fa-instagram" {{  old('icon') == "fab fa-instagram" ? 'selected' : '' }}> Instagram </option>
                                <option value="fab fa-youtube" {{  old('icon') == "fab fa-youtube" ? 'selected' : '' }}> YouTube </option>
                                <option value="fab fa-pinterest" {{  old('icon') == "fab fa-pinterest" ? 'selected' : '' }}> Pinterest </option>
                                <option value="fab fa-telegram" {{  old('icon') == "fab fa-telegram" ? 'selected' : '' }}> Telegram </option>
                                <option value="fab fa-reddit" {{  old('icon') == "fab fa-reddit" ? 'selected' : '' }}> Reddit </option>
                                <option value="fab fa-quora" {{  old('icon') == "fab fa-quora" ? 'selected' : '' }}> Quora </option>
                                <option value="fab fa-snapchat" {{  old('icon') == "fab fa-snapchat" ? 'selected' : '' }}> Snapchat </option>
                                <option value="fab fa-linkedin" {{  old('icon') == "fab fa-linkedin" ? 'selected' : '' }}> LinkedIn </option>
                                <option value="fab fa-behance" {{  old('icon') == "fab fa-behance" ? 'selected' : '' }}> Behance </option>
                                <option value="fab fa-dribbble" {{  old('icon') == "fab fa-dribbble" ? 'selected' : '' }}> Dribbble </option>
                                <option value="fab fa-github" {{  old('icon') == "fab fa-github" ? 'selected' : '' }}> Github </option>
                            </select>

                            @error('icon')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Social Media Link --}}
                        <div class="mb-3 col-12">
                            <label for="link" class="form-label">Social Media Link *</label>
                            <input name="link" type="url" class="form-control" id="link" value="{{ old('link') }}">

                            @error('link')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-lg btn-primary d-block m-auto">Add Social Media</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
