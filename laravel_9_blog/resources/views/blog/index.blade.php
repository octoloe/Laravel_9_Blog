@extends('layouts.app')

@section('content')

<div class="row g-5 text-center">
    
    <div class="col-md-8">
    
        <article class="blog-post">
                
            <h2 class="blog-post-title mb-5">Blog Posts</h2>

            <div class="row">
                    
                <div class="col-4">

                    @if (session()->has('message'))

                        <div class="alert alert-info" role="alert">
                        
                            {{ session()->get('message') }}

                        </div>
                    
                    @endif
                </div>

            </div>


        @foreach ($posts as $post )

            <h3 class="blog-post mb-1">{{ $post->title }}</h3>
            
            <div class="col-auto d-none d-lg-block">
                    
                <img src="{{ asset('assets/img/'. $post->image_path) }}" class="bd-placeholder-img" width="200"  alt="..." />
            
            </div>
            
            <p class="blog-post-meta">Created on {{ date('jS M Y', strtotime($post->updated_at)) }} by
            
                <a href="#">
                                                    
                    <strong><span><i> {{ $post->user->name }}</i></span></strong>
                
                </a>
            
            </p>
            
            <p>{{ $post->description }}</p>
        
            <nav class="blog-pagination mt-5" aria-label="Pagination">

                <a href="/blog/{{ $post->slug }}" class="btn btn-outline-info shadow rounded-pill btn-sm">Continue reading</a>

                <div class="btn-group m-2">

                    @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)

                        <a href="/blog/create" class="btn btn-outline-success shadow rounded-pill btn-sm" tabindex="-1" role="button" aria-disabled="true">Create post</a>

                        <a href="/blog/{{ $post->slug }}/edit" class="btn btn-outline-warning shadow rounded-pill btn-sm" tabindex="-1" role="button" aria-disabled="true">Edit post</a>

                        <form action="/blog/{{ $post->slug }}" method="POST"> 

                            @csrf

                            @method('delete')

                            <button type="submit" class="btn btn-outline-danger shadow rounded-pill btn-sm">Delete post</button>
                                
                        </form> 

                    @endif

                </div>
                
            </nav>

        @endforeach

            <hr>

        </article>
    
    </div>

</div>

@endsection

