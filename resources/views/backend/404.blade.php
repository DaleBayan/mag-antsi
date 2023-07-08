@extends('layouts.auth.app')

@section('content')

<div class="h-screen w-full grid grid-rows-2 place-items-center">

  <h1 class="font-bold text-4xl md:text-7xl text-red-600 tracking-tight">
    <i class="fa-solid fa-triangle-exclamation"></i>
    404
    <span class="text-gray-900 rotate-45">Error Page</span>
  </h1>

  <div class="p-2 md:p-0 h-full w-full flex flex-col justify-center items-center gap-8 bg-green-500 text-gray-800">
    <h2 class="font-bold text-xl md:text-3xl text-center tracking-tight">The page you are looking for doesn't exist.</h2>
    <a href="/" class="py-1.5 px-3 border border-gray-900 rounded-lg font-bold md:text-2xl transition ease-in-out delay-150 duration-300 hover:bg-gray-900 hover:text-white hover:-translate-y-1 hover:scale-110">
      <i class="fa-solid fa-house"></i>
      Home
    </a>
  </div>
 
  
</div>
@endsection