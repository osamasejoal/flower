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

                {{-- Success message --}}
                <div class="col-lg-10 m-auto">
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div id="status-success" class="alert alert-success text-center" hidden></div>

                    {{-- Table start from here --}}
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Company Name</th>
                                <th>Link</th>
                                <th>Logo</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tbcs as $tbc)
                                <tr>
                                    <td>{{ $tbc->name }}</td>
                                    <td>{{ $tbc->link }}</td>
                                    <td>
                                        <img src="{{ asset('backend/assets/images/tbc' . '/' . $tbc->logo) }}" alt=""
                                            width="80px">
                                    </td>
                                    <td class="status-change-toggle">
                                        <input data-id="{{$tbc->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" 
                                        data-toggle="toggle" data-on="Enable" data-off="Disable" data-size="mini" {{ $tbc->status == 1 ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <a href="{{ route('tbc.edit', $tbc->id) }}" class="mr-3"
                                            style="font-size:30px;border-bottom:0;">
                                            <abbr title="Edit" style="text-decoration:none;"><i
                                                    class="font-icon font-icon-pencil"></i></abbr>
                                        </a>
                                        <form class="d-inline" action="{{ route('tbc.destroy', $tbc->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button style="font-size:30px;border:none;background:transparent;color:#0082c6">
                                                <abbr title="Delete" style="text-decoration:none;"><i
                                                        class="font-icon font-icon-trash"></i></abbr>
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

@section('script-content')
    <script>
        $(function() {
            $('#toggle-two').bootstrapToggle({
                on: 'Enabled',
                off: 'Disabled'
            });
        });
    </script>

    <script>
        $('document').ready(function(){
            $('.toggle-class').change(function(){
                var status = $(this).prop('checked') == true ? 1 : 0;
                var tbc_id = $(this).data('id');

                $.ajax({
                    type: "get",
                    datatype: "json",
                    url: '/tbc/status/change',
                    data: {'status': status, 'tbc_id': tbc_id},
                    success: function(data){
                        console.log(data.success);
                        $('#status-success').addClass('d-block');
                        $('#status-success').html(data.success);

                        setTimeout(function() {
                            $('#status-success').removeClass('d-block');
                        }, 1200);
                        
                    }
                });
            });
        });
    </script>
@endsection
