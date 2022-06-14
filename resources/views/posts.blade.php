@extends('layouts.main')

@section('container')



    <!-- Page header with logo and tagline-->
    @include('partials.header')
    <!-- Page content-->
    <div class="ms-3">
        <div class="mb-10">
            <h4>Berita Desa</h4>
            <hr size="10px" width="130px">
        </div>
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card col-me-4 mb-4">
                    @if ($posts->count())
                        @if ($posts[0]->image)
                            <div style="max-height: 350px; overflow:hidden;">
                                <img src="{{ asset('storage/' . $posts[0]->image) }}"
                                    alt="{{ $posts[0]->category->name }}" class="img-fluid">
                            </div>
                        @else
                            <img src="https://source.unsplash.com/850x350?{{ $posts[0]->category->name }}"
                                class="card-img-top" alt="{{ $posts[0]->category->name }}">
                        @endif
                        <div class="card-body">
                            <h3 class="card-title">
                                <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">
                                    {{ $posts[0]->title }}
                                </a>
                            </h3>
                            <p>
                                <small class="text-muted">
                                    by. <a href="/posts?author={{ $posts[0]->author->username }}"
                                        class="text-decoration-none">{{ $posts[0]->author->name }}</a> in
                                    <a href="/?category={{ $posts[0]->category->slug }}" class="text-decoration-none">
                                        {{ $posts[0]->category->name }}</a>
                                    {{ $posts[0]->created_at->diffForHumans() }}
                                </small>
                            </p>
                            <p class="card-text">{{ $posts[0]->excerpt }}</p>
                            <a class="btn btn-primary" href="/posts/{{ $posts[0]->slug }}">Read more →</a>
                        </div>
                </div>
                <!-- Nested row for non-featured blog posts-->

                <div class="row">
                    @foreach ($posts->skip(1) as $post)
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <div class="position-absolute px-3 py-2 " style="background-color: rgba(0,0,0,0.7)">
                                    <a href="/?category={{ $post->category->slug }}"
                                        class="text-white text-decoration-none">
                                        {{ $post->category->name }}</a>
                                </div>
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}"
                                        alt="{{ $post->category->name }}" class="img-fluid">
                                @else
                                    <img src="https://source.unsplash.com/700x350?{{ $post->category->name }}"
                                        class="card-img-top" alt="{{ $post->category->name }}">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p>
                                        <small class="text-muted">
                                            by. <a href="/posts?author={{ $post->author->username }}"
                                                class="text-decoration-none">{{ $post->author->name }}</a>
                                            {{ $post->created_at->diffForHumans() }}
                                        </small>
                                    </p>
                                    <p class="card-text"> {{ $post->excerpt }} </p>
                                    <a class="btn btn-primary" href="/posts/{{ $post->slug }}">Read more →</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Side widgets-->
            @include('partials.nav')



        </div>
    </div>
    </div>
@else
    <p class="text-center fs-4">No berita found</p>
    @endif
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>

    <div class="">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4">
                    <a href="/posts?category={{ $category->slug }}">
                        <div class="card bg-dark text-white">
                            <img src="https://source.unsplash.com/500x400?{{ $category->name }}" class="card-img"
                                alt="{{ $category->name }}">
                            <div class="card-img-overlay d-flex align-items-center p-0 fs-3">
                                <h5 class="card-title text-center flex-fill p-4"
                                    style="background-color: rgba(0, 0, 0,0.7)">
                                    {{ $category->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endsection
