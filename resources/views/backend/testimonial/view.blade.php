@extends('backend.layouts.master')


@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">

                {{-- Page header --}}
                <div class="col-lg-12 text-center my-2">
                    <h2>View Testimonial</h2>
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
                                <th>Name</th>
                                <th>Profession</th>
                                <th>Qoute</th>
                                <th>Image</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($testimonials as $testimonial)
                                <tr>

                                    {{-- Client Name --}}
                                    <td>{{ $testimonial->name }}</td>

                                    {{-- Client Profession --}}
                                    <td>{{ $testimonial->profession }}</td>

                                    {{-- Client Quote --}}
                                    <td class="col-3">{{ $testimonial->quote }}</td>

                                    {{-- Client Image --}}
                                    <td>
                                        <img src="{{ asset('backend/assets/images/testimonial' . '/' . $testimonial->image) }}" alt="Image not found"
                                            width="80px">
                                    </td>

                                    {{-- Client Status --}}
                                    <td class="status-change-toggle">
                                        <input data-id="{{$testimonial->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" 
                                        data-toggle="toggle" data-on="Enable" data-off="Disable" data-size="mini" {{ $testimonial->status == 1 ? 'checked' : '' }}>
                                    </td>

                                    {{-- Action --}}
                                    <td>
                                        <a href="{{ route('testimonial.edit', $testimonial->id) }}" class="mr-3"
                                            style="font-size:30px;border-bottom:0;">
                                            <abbr title="Edit" style="text-decoration:none;"><i
                                                    class="font-icon font-icon-pencil"></i></abbr>
                                        </a>
                                        <form class="d-inline" action="{{ route('testimonial.destroy', $testimonial->id) }}"
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
                                    <td colspan="10" class="text-danger text-center">There are no Testimonial.</td>
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
                var status          = $(this).prop('checked') == true ? 1 : 0;
                var testimonial_id  = $(this).data('id');

                $.ajax({
                    type: "get",
                    datatype: "json",
                    url: '/testimonial/status/change',
                    data: {'status': status, 'testimonial_id': testimonial_id},
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
