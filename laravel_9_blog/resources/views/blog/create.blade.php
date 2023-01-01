@extends('layouts.app')

@section('content')

    <article class="blog-post">
                
        <h2 class="blog-post-title mb-5">Create Post</h2>

            <div class="mb-3">

                @if ($errors->any())
               
                    <div class="row">
                   
                        <div class="col-4">

                            @foreach ($errors->all() as $error )

                                <div class="alert alert-danger" role="alert">
                                    
                                    {{ $error }}
                                 
                                </div>
                        
                            @endforeach

                        </div>
                
                    </div>
    
                 @endif

                <form action="/blog" method="POST" enctype="multipart/form-data">
        
                    @csrf
        
                    <label for="title" class="form-label">Title</label>
                        
                    <input type="text" name="title" class="form-control shadow-sm" placeholder="Title..." />    
              
                    <div class="mt-3">
                            
                        <label for="description" class="form-label">Description</label>
                            
                        <textarea class="form-control shadow-sm" name="description" placeholder="Description" rows="3"></textarea>

                    </div>
        
                    <div class="input-group mt-3 mb-3">
                                      
                        <span class="input-group-text">

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                        
                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                 
                            </svg>

                        </span>

                        <input type="file" name="image" class="form-control shadow-sm hidden" />  
                            
                    </div>
        
                    <button type="submit" class="btn btn-outline-success shadow rounded-pill btn-sm mt-3">Submit Post</button>
                
                </form>
        
            </div>

    </article>

@endsection

