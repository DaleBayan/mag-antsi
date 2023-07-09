@extends('layouts.auth.app')

@section('content')

<section class="h-screen w-screen bg-white flex flex-col md:flex-row justify-start md:justify-center items-center">
    <div class="h-5/6 w-5/6 px-8 md:px-0 bg-white md:bg-green-100 grid md:grid-cols-2 place-items-center md:rounded md:shadow-lg">
        
        {{-- Overview of the Project --}}
        <div class="hidden p-0 md:p-24 h-full w-full md:flex flex-col justify-start items-start">
            
            <div class="space-y-5">
                <h1 class="font-bold text-5xl text-green-600 tracking-tight">
                    Mag<span class="font-normal text-gray-900">-</span><span class="text-red-600">Antsi</span>
                    <span class="text-gray-900 text-xl tracking-normal">Project</span>
                </h1>
                <p class="text-sm text-gray-800 tracking-wide">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro voluptates, recusandae ut molestiae ea qui quia incidunt praesentium quae molestias repudiandae aliquid eius deleniti eos? Nobis, voluptate neque! Iste, ea?
                </p>
            </div>
        </div>

        {{-- Log in Card --}}
        <form
            method="POST"
            action="{{ route('authenticate') }}"
            class="relative md:pt-10 md:px-10 md:h-5/6 md:w-2/3 bg-white flex flex-col justify-start items-center md:items-start gap-y-6 md:rounded md:shadow-lg text-green-700">
        @csrf
            
            @if(session()->has('message'))
                <div
                    class="pt-1.5 mx-10 fixed md:absolute top-0 left-0 right-0"
                    x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)"
                    x-show="show"
                    x-transition:leave.opacity.scale.50.duration.500ms>
                    <p class="py-1.5 px-3 border border-green-600 font-bold text-center md:text-start text-green-600 tracking-tight rounded shadow-2xl">
                        <i class="fa-solid fa-hands-clapping"></i>
                        {{session('message')}}
                    </p>
                </div>
            @endif

            <div class="mt-2 text-center md:text-start space-y-1">
                <h1 class="mb-2 block md:hidden font-bold text-5xl text-green-600">
                    Mag<span class="text-gray-900">-</span><span class="text-red-600">Antsi</span> <span class="font-normal text-gray-800 text-2xl">Project</span>
                </h1>
                <h2 class="font-bold text-xl md:text-normal tracking-tight">Login</h2>
                <h3 class="font-bold text-sm md:text-normal tracking-tight">Welcome back! Please log in to your account.</h3>
            </div>
            
            <div class="w-full space-y-2">

                <div class="space-y-1">
                    <i class="fa-solid fa-user"></i><span class="ml-2 text-sm">Username</span>
                    <input type="text" name="username" class="mt-1 px-4 py-1 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-green-500 focus:ring-green-500 block w-full rounded-md sm:text-sm focus:ring-1" autofocus required>
                    
                    @error('username')
                        <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                    @enderror
                </div>

                <div class="space-y-1">
                    <i class="fa-solid fa-lock"></i><span class="ml-2 text-sm">Password</span>
                    <input type="password" name="password" class="mt-1 px-4 py-1 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-green-500 focus:ring-green-500 block w-full rounded-md sm:text-sm focus:ring-1" required>
                </div>

            </div>

            <button class="py-1.5 px-3 border border-green-500 rounded-lg transition ease-in-out delay-150 duration-300 hover:bg-green-500 hover:text-white hover:-translate-y-1 hover:scale-110">
                Sign in
            </button>

             <img src="{{ asset('backend/images/logo.png') }}" alt="" class="block w-3/4 md:w-1/2">
        </form>

    </div>

    {{-- Mobile Version Footer --}}
    <div class="block md:hidden fixed bottom-0 w-full p-12 bg-green-600"></div>
 

</section>

@endsection
