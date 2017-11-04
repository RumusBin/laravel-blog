@extends('user.app')

@section('bg-img', asset('user/img/post-bg.jpg'))
@section('head-text', $post->title)
@section('sub-head-text', $post->sub_title)
@section('title', $post->title)

@section('content')

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <small>Created at: <i>{{$post->created_at->diffForHumans()}}</i></small>

                    <small class="pull-right">Categories:
                        @foreach($post->categories as $category)
                            <a href="{{route('category', $category->slug)}}">
                            {{$category->name}}
                            </a>
                        @endforeach

                    </small>

                   {!! $post->body !!}
                    <h3>Tags cloud:</h3>
                    @foreach($post->tags as $tag)
                    <a href="{{route('tag', $tag->slug)}}">
                        <span class="pull-left" style="border: 1px solid grey; border-radius: 5px; padding: 5px">

                                {{$tag->name}}

                        </span>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </article>

    <hr>


    @endsection