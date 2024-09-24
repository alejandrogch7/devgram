@extends('layouts.app')

@section('title')
    Login on Devgram!   
@endsection

@section('content')
    <div class="md:flex md:justify-center md:gap-5 md:items-center">
        <div class="md:w-4/12">
            <img src="{{ asset('img/login.jpg')}}" alt="Login Image">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf
                
                @if (@session('message'))
                    <p class="text-red-700 my-2 rounded-lg text-sm p-2 text-center ">
                        {{ session('message') }}
                    </p>
                @endif


                <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                    Email Address:
                </label>
                <input 
                    id="email"
                    name="email"
                    type="text"
                    placeholder="Your Email Here"
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
                    <input type="checkbox" name="remember">
                    <label class=" text-gray-500 text-sm">Remember Me</label>
                </div>

                <input type="submit" value="Log In" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>                
        </div>
    </div>
@endsection