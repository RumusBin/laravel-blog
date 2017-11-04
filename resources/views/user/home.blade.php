
@extends('user.app')
@section('bg-img', asset('user/img/home-bg.jpg'))
    @section('head-text', 'RumusBin Blog')
    @section('sub-head-text', 'A Blog build on Laravel 5.5')
    @section('title', 'RumusBin Blog | Main page')
        @section('head')
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <style>
                .fa-thumbs-up:hover{
                    color: #e30c0b;
                }
            </style>
            @endsection
@section('content')
<!-- Main Content -->
<div class="container">
    <div class="row" id="app">
        <div class="col-lg-8 col-md-10 mx-auto">

                <Posts
                        v-for='value in blog'
                        :title="value.title"
                        :sub_title="value.sub_title"
                        :created_at="value.created_at"
                        :key="value.index"
                >
                </Posts>

            <hr>
            <!-- Pager -->
            <div class="clearfix"></div>
                        {{$posts->links()}}
        </div>
    </div>
</div>

<hr>
    @endsection
@section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
@endsection
