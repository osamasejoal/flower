@extends('backend.layouts.master')


@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="message-wrap col-lg-10 m-auto">
                <div class="msg-wrap">

                    @foreach ($messages as $message)
                        <div class="media msg" style="border-bottom:1px solid #ddd">
                            <div class="media-body p-2">

                                {{-- Message time --}}
                                <small class="float-right time" style="font-size:14px">
                                    <i class="far fa-clock"></i>
                                    {{ $message->created_at->diffForHumans() }}
                                </small>

                                {{-- Sender Name --}}
                                <h5 class="media-heading mb-0" style="font-size:22px;">{{ $message->name }}</h5>

                                {{-- Sender Email --}}
                                <a class="d-block mb-3" style="font-size:20px;color:#0082c6;font-weight:600">{{ $message->email }}</a>

                                {{-- Messages --}}
                                <small class="" style="font-size:18px;text-align:justify">{{ $message->message }}</small>

                                {{-- <small class="" style="font-size:18px;width:98%;height:1.2rem;display:inline-block;overflow:hidden">{{ $message->message }}</small> --}}

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
