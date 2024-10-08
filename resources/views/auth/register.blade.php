@extends('layouts.app')

@section('title')
    Sign In on Devgram!   
@endsection

@section('content')
    <div class="md:flex md:justify-center md:gap-5 md:items-center">
        <div class="md:w-4/12">
            <img src="{{ asset('img/registrar.jpg')}}" alt="Register Image">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('register') }}" method="POST">
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
                    value="{{ old('name') }}"
                >    
                @error('name')
                    <p class="text-red-700 my-2 rounded-lg text-sm p-2 text-center ">
                        {{ $message }}
                    </p>
                @enderror
                </div>    
                <div class="mb-5">
                <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                    Username:
                </label>
                <input 
                    id="username"
                    name="username"
                    type="text"
                    placeholder="Your Username"
                    class="border p-3 w-full rounded-lg
                    @error('username')
                        border-red-700    
                    @enderror
                    value="{{ old('username') }}"
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
                    value="{{ old('email') }}"
                    >
                @error('email')
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

                <input type="submit" value="create account" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>                
        </div>
    </div>
@endsection