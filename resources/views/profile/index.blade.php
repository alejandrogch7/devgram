@extends('layouts.app')

@section('title')
    Edit profile: {{ Auth::user()->username }}
@endsection

@section('content')
<div class="md:flex md:justify-center">
    <div class="md:w-1/2 bg-white shadow p-6">
        <form 
            class="mt-10 md:mt-0" 
            method="POST" 
            action="{{ route('profile.store')  }}"
            enctype="multipart/form-data"
            >
            @csrf

            <div class="mb-5">
                <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                    Name:
                </label>
                <input 
                    id="name"
                    name="name"
                    type="text"
                    placeholder="Your Name"
                    class="border p-3 w-full rounded-lg 
                    @error('name')
                        border-red-700    
                    @enderror
                    value="{{ Auth::user()->name }}"
                >    
                @error('name')
                    <p class="text-red-700 my-2 rounded-lg text-sm p-2 text-center ">
                        {{ $message }}
                    </p>
                @enderror
                </div>    

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Your username:
                    </label>
                    <input 
                        id="username"
                        name="username"
                        type="text"
                        placeholder="Your username"
                        class="border p-3 w-full rounded-lg 
                        @error('username')
                            border-red-700    
                        @enderror
                        value="{{ Auth::user()->username }}"
                    >    
                    @error('username')
                        <p class="text-red-700 my-2 rounded-lg text-sm p-2 text-center ">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email Address:
                    </label>
                    <input 
                        id="email"
                        name="email"
                        type="text"
                        placeholder="Your Email ex:youremail@email.com"
                        class="border p-3 w-full rounded-lg
                        @error('email')
                            border-red-700    
                        @enderror
                        value="{{ Auth::user()->email }}"
                        >
                    @error('email')
                        <p class="text-red-700 my-2 rounded-lg text-sm p-2 text-center ">
                            {{ $message }}
                        </p>
                    @enderror    
                </div> 

                <div class="mb-5">
                    <label for="current_password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Current Password:
                    </label>
                    <input 
                        id="current_password"
                        name="current_password"
                        type="password"
                        placeholder="Your Current Password"
                        class="border p-3 w-full rounded-lg
                        @error('current_password')
                            border-red-700    
                        @enderror"
                    >    
                    @error('current_password')
                        <p class="text-red-700 my-2 rounded-lg text-sm p-2 text-center ">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password:
                    </label>
                    <input 
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Your Password"
                        class="border p-3 w-full rounded-lg
                        @error('password')
                            border-red-700    
                        @enderror"
                    >    
                    @error('password')
                        <p class="text-red-700 my-2 rounded-lg text-sm p-2 text-center ">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                       
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                        Confirm password:
                    </label>
                    <input 
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        placeholder="Your Password"
                        class="border p-3 w-full rounded-lg"
                    >    
                </div>  

                <div class="mb-5">
                    <label for="image" class="mb-2 block uppercase text-gray-500 font-bold">
                    Profile Picture:
                    </label>
                    <input 
                        id="image"
                        name="image"
                        type="file"
                        class="border p-3 w-full rounded-lg"
                        value="" 
                        accept='.jpg, .png, jpeg'
                    />                     
                </div>

                <div class="flex w-full justify-center">
                    <input 
                        type="submit" 
                        value="save changes" 
                        class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-1/3 p-3 text-white rounded-lg justify-center"
                    />
                </div>

        </form>
    </div>
</div>
    
@endsection