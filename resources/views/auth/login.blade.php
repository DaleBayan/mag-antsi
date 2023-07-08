@extends('layouts.auth.app')

@section('content')

<section class="h-full w-full flex flex-col md:flex-row justify-start md:justify-center items-center">
    <div class="md:h-5/6 md:w-3/4 md:p-24 bg-green-100 grid md:grid-cols-2 justify-items-center content-center md:rounded-lg md:shadow-lg">
        
        <div class="hidden h-full w-full pt-10 pr-20 md:flex flex-col justify-start items-start gap-y-8">
            <h1 class="font-bold text-5xl text-green-600">
                Mag-<span class="text-red-600">Antsi</span> <span class="font-normal text-gray-800 text-2xl">Project</span>
            </h1>
            <p class="text-sm text-gray-800 tracking-widest">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro voluptates, recusandae ut molestiae ea qui quia incidunt praesentium quae molestias repudiandae aliquid eius deleniti eos? Nobis, voluptate neque! Iste, ea?
            </p>
        </div>

        {{-- Log in Card --}}
        <form method="POST" action="{{ route('authenticate') }}" class="h-full py-16 px-12 bg-white flex flex-col justify-center items-start gap-y-8 md:rounded-lg md:shadow-lg text-green-800">
        @csrf

            <div>
                <h1 class="block md:hidden font-bold text-5xl text-green-600 mb-8">
                    Mag<span class="text-gray-900">-</span><span class="text-red-600">Antsi</span> <span class="font-normal text-gray-800 text-2xl">Project</span>
                </h1>
                <h2 class="mb-2 font-bold text-3xl text-red-700">Kayantabe</h2>
                <h3 class="text-xl">Login</h3>
                <h4 class="text-sm">Welcome back. Please log in to your account.</h4>
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

            <button class="py-1.5 px-3 border border-green-500 rounded-lg text-sm transition ease-in-out delay-150 duration-300 hover:bg-green-500 hover:text-white hover:-translate-y-1 hover:scale-110">
                Sign in
            </button>

        </div>

    </div>

    <div class="w-full fixed bottom-0 md:hidden p-16 bg-green-600">
        
    </div>
</section>

@endsection
