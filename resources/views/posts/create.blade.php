 @extends('layouts.app')

 @section('title')
    Create a new post!
 @endsection

 @push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
 @endpush

 @section('content')
 <div class="md:flex md:items-center">
    <div class="md:w-1/2 p-10">
        <form 
            action="{{ route('images.store') }}"
            method="POST"
            enctype="multipart/form-data"
            id="dropzone"
            class="dropzone border-2 w-full h-96 rounded flex flex-col justify-center items-center">
            @csrf
        </form>
    </div>
    <div class="md:w-1/2 p-10 rounded-lg mt-10 md:mt-0 shadow-2xl">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            
            <div class="mb-5">
                <label for="title" class="mb-2 block uppercase text-gray-500 font-bold">
                    Title:
                </label>
                <input 
                    id="title"
                    name="title"
                    type="text"
                    placeholder="Post Title"
                    class="border p-3 w-full rounded-lg 
                    @error('title')
                        border-red-700    
                    @enderror
                    value="{{ old('title') }}"
                >    
                @error('title')
                    <p class="text-red-700 my-2 rounded-lg text-sm p-2 text-center ">
                        {{ $message }}
                    </p>
                @enderror
            </div>    
            
            <div class="mb-5">
                <label for="description" class="mb-2 block uppercase text-gray-500 font-bold">
                    Description:
                </label>
                <textarea 
                    cols="30" 
                    rows="10"
                    id="description"
                    name="description"
                    type="text"
                    placeholder="Your post description"
                    class="border p-3 w-full rounded-lg
                    @error('description')
                        border-red-700    
                    @enderror">{{ old('description') }}</textarea>   
                @error('description')
                    <p class="text-red-700 my-2 rounded-lg text-sm p-2 text-center ">
                        {{ $message }}
                    </p>
                @enderror
            </div>   

            <div class="mb-5">
                <input 
                    type="hidden" 
                    name="image"
                    value="{{ old('image') }}" 
                />
                @error('image')
                    <p class="text-red-700 my-2 rounded-lg text-sm p-2 text-center ">
                        {{ $message }}
                    </p>
                @enderror

            </div>
            <input type="submit" value="create post" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">

        </form>
    </div>
 </div>
 @endsection