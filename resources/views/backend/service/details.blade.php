@extends('backend.layouts.master')


@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">

                {{-- Page header --}}
                <div class="col-lg-12 text-center my-2">
                    <h1 class="font-weight-bold text-secondary">Service details</h1>
                </div>

                {{-- Form field --}}
                <div class="col-lg-11 m-auto">
                    <table class="table mb-5" style="font-size:25px">
                        <tbody>

                            {{-- Service Name --}}
                            <tr>
                                <td class="w-25 align-top">Service Name:</td>
                                <td style="font-weight:600">{{ $service->name }}</td>
                            </tr>

                            {{-- Service Icon --}}
                            <tr>
                                <td class="w-25 align-top">Service Icon:</td>
                                <td style="font-size:30">
                                    <i class="{{ $service->icon }}"></i>
                                </td>
                            </tr>

                            {{-- Service Image --}}
                            <tr>
                                <td class="w-25 align-top pt-4">Service Image:</td>
                                <td style="">
                                    <img src="{{ asset('backend/assets/images/service/' . $service->image) }}" alt=""
                                        width="500px">
                                </td>
                            </tr>

                            {{-- Short Description --}}
                            <tr>
                                <td class="w-25 align-top pt-4">Short Description:</td>
                                <td class="py-4 pr-4">{{ $service->short_desc }}</td>
                            </tr>

                            {{-- Long Description --}}
                            <tr>
                                <td class="w-25 align-top pt-4">Long Description:</td>
                                <td class="py-4 pr-4">{{ $service->long_desc }}</td>
                            </tr>

                            {{-- Action --}}
                            <tr>
                                <td class="w-25 align-top pt-5">Action:</td>
                                <td class="p-5">

                                    <a href="{{ route('service.edit', $service->id) }}" class="mr-5"
                                        style="font-size:60px;border-bottom:0;">
                                        <abbr title="Edit" style="text-decoration:none;"><i
                                                class="font-icon font-icon-pencil"></i></abbr>
                                    </a>

                                    <form class="d-inline" action="{{ route('service.destroy', $service->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="ml-5" style="font-size:60px;border:none;background:transparent;color:#0082c6">
                                            <abbr title="Delete" style="text-decoration:none;"><i
                                                    class="font-icon font-icon-trash"></i></abbr>
                                        </button>
                                    </form>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
