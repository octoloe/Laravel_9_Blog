@extends('layouts.app')

@section('content')

<div class="mx-auto">

    <h3 class="blog-post-title mb-5">Show Post</h3>

      <div class="card shadow mb-3 mx-auto" style="width: 25rem;">
        
        <img src="{{ asset('assets/img/'. $post->image_path) }}" class="card-img-top" width="200" alt="...">
        
        <div class="card-body">
          
            <h5 class="card-title text-center">{{ $post->title }}</h5>
          
            <p class="card-text">{{ $post->description }}</p>
          
            <p class="card-text"><small class="text-muted">{{ date('jS M Y', strtotime($post->updated_at)) }}</small></p>

            <a href="/blog" class="btn btn-outline-primary">Back</a>
       
        </div>
      
    </div>

</div>
    
@endsection