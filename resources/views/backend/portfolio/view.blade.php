@extends('backend.layouts.master')


@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">

                {{-- Page header --}}
                <div class="col-lg-12 text-center my-2">
                    <h2>View Project</h2>
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
                                <th>Type</th>
                                <th>Name</th>
                                <th>Link</th>
                                <th>Image</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($portfolios as $portfolio)
                                <tr>
                                    {{-- Project Type --}}
                                    <td>{{$portfolio->type}}</td>

                                    {{-- Project Name --}}
                                    <td>{{$portfolio->name}}</td>

                                    {{-- Project Link --}}
                                    <td>{{$portfolio->link}}</td>

                                    {{-- Project Image --}}
                                    <td>
                                        <img src="{{asset('backend/assets/images/portfolio/' . $portfolio->image)}}" alt="" width="100px">
                                    </td>

                                    {{-- Project Status --}}
                                    <td class="status-change-toggle">
                                        <input data-id="{{$portfolio->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" 
                                        data-toggle="toggle" data-on="Enable" data-off="Disable" data-size="mini" {{ $portfolio->status == 1 ? 'checked' : '' }}>
                                    </td>

                                    {{-- Action --}}
                                    <td>
                                        <a href="{{ route('portfolio.edit', $portfolio->id) }}" class="mr-3"
                                            style="font-size:30px;border-bottom:0;">
                                            <abbr title="Edit" style="text-decoration:none;"><i
                                                    class="font-icon font-icon-pencil"></i></abbr>
                                        </a>
                                        <form class="d-inline" action="{{ route('portfolio.destroy', $portfolio->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button style="font-size:30px;border:none;background:transparent;color:#0082c6">
                                                <abbr title="Delete" style="text-decoration:none;"><i
                                                        class="font-icon font-icon-trash"></i></abbr>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-danger text-center">There are no Project.</td>
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
                var portfolio_id = $(this).data('id');

                $.ajax({
                    type: "get",
                    datatype: "json",
                    url: '/portfolio/status/change',
                    data: {'status': status, 'portfolio_id': portfolio_id},
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
