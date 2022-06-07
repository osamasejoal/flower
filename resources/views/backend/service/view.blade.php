@extends('backend.layouts.master')


@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">

                {{-- Page header --}}
                <div class="col-lg-12 text-center my-2">
                    <h2>View Company</h2>
                </div>
                
                {{-- Table field --}}
                <div class="col-lg-10 m-auto">
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{session('success')}}
                        </div>
                    @endif
                        
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Company Name</th>
                                <th>Link</th>
                                <th>Logo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tbcs as $tbc)
                                <tr>
                                    <td>{{$tbc->name}}</td>
                                    <td>{{$tbc->link}}</td>
                                    <td>
                                        <img src="{{asset('backend/assets/images/tbc' . '/' . $tbc->logo)}}" alt="" width="80px">
                                    </td>
                                    <td>
                                        <a href="{{route('tbc.edit', $tbc->id)}}" class="mr-3" style="font-size:30px;border-bottom:0;">
                                            <abbr title="Edit" style="text-decoration:none;"><i class="font-icon font-icon-pencil"></i></abbr>
                                        </a>
                                        <form class="d-inline" action="{{route('tbc.destroy', $tbc->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button style="font-size:30px;border:none;background:transparent;color:#0082c6">
                                                <abbr title="Delete" style="text-decoration:none;"><i class="font-icon font-icon-trash"></i></abbr>
                                            </button>
                                        </form>
                                        {{-- <a href="{{route('tbc.destroy', $tbc->id)}}" style="font-size:30px;border-bottom:0;">
                                            <abbr title="Delete" style="text-decoration:none;"><i class="font-icon font-icon-trash"></i></abbr>
                                        </a> --}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-danger text-center">There are no Companies.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
@endsection
