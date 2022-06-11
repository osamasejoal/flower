@extends('backend.layouts.master')


@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">

                {{-- Page header --}}
                <div class="col-lg-12 text-center my-2">
                    <h2>Social Media</h2>
                </div>


                {{-- Table field --}}
                <div class="col-lg-11 m-auto">

                    {{-- Success message --}}
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    {{-- Success for status --}}
                    <div id="status-success" class="alert alert-success text-center" hidden></div>

                    {{-- Add Social Media --}}
                    <a href="{{route('social.create')}}" class="btn btn-primary mb-2 float-right">
                        <i class="fas fa-plus"></i> 
                        Add Social Media
                    </a>

                    {{-- Table start from here --}}
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Icon</th>
                                <th>Link</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($socials as $social)
                                <tr>

                                    {{-- Social Media Icon --}}
                                    <td class="" style="font-size: 40px">
                                        <i class="{{ $social->icon }}"></i>
                                    </td>

                                    {{-- Social Media Link --}}
                                    <td class="col-5">
                                        <a class="border-0" target="_blank" href="{{ $social->link }}">{{ $social->link }}</a>
                                    </td>

                                    {{-- Client Status --}}
                                    <td class="status-change-toggle">
                                        <input data-id="{{$social->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" 
                                        data-toggle="toggle" data-on="Enable" data-off="Disable" data-size="mini" {{ $social->status == 1 ? 'checked' : '' }}>
                                    </td>

                                    {{-- Action --}}
                                    <td>
                                        <form class="d-inline" action="{{ route('social.destroy', $social->id) }}"
                                            method="POST">
                                            @csrf
                                            <button style="font-size:30px;border:none;background:transparent;color:#0082c6">
                                                <abbr title="Delete" style="text-decoration:none;"><i
                                                        class="font-icon font-icon-trash"></i></abbr>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-danger text-center">There are no Social Media.</td>
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
                var status      = $(this).prop('checked') == true ? 1 : 0;
                var social_id   = $(this).data('id');

                $.ajax({
                    type: "get",
                    datatype: "json",
                    url: '/company/social/status',
                    data: {'status': status, 'social_id': social_id},
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
