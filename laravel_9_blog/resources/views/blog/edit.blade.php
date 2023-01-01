@extends('layouts.app')

@section('content')

<div class="mx-auto">

    <div class="row mb-5">

        <h3>Update Post</h3>

    </div>

    @if ($errors->any())

        <div class="">
 
            <ul>

                @foreach ($errors->all() as $error )
                    
                    <li class="">
                         
                        {{ $error }}

                    </li>
            
                @endforeach

                </ul>

        </div>
    
    @endif

    <div class="mb-3">

        <form action="/blog/{{ $post->slug }}" method="POST" enctype="multipart/form-data">

            @csrf

            @method('PUT')

            <label for="title" class="form-label">Title</label>
                
            <input type="text" name="title" class="form-control" value="{{ $post->title }}"/>

            <div class="mt-3">
                    
                <label for="description" class="form-label">Description</label>
                    
                <textarea class="form-control" name="description" rows="3">
                    
                    {{ $post->description }}
                
                </textarea>

            </div>

            <button type="submit" class="btn btn-outline-success shadow rounded-pill btn-sm mt-3">Update post</button>

        </form>
        
    </div>
    
</div>
    
@endsection