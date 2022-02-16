@extends('layouts.main')

@section('content')
    <div class="mx-5 flex-grow">

    <div class="relative flex py-5 items-center">
        <div class="flex-grow border-t border-gray-400"></div>
        <span class="flex-shrink mx-4 text-gray-400">Most Popular Recipes</span>
        <div class="flex-grow border-t border-gray-400"></div>
    </div>
        <div class="grid md:grid-cols-4 gap-10 py-8">
            @foreach ($recipes as $item)
           {{-- <pre class="font-playfair">{{ $item->method }}</pre> --}}
                <div class="rounded overflow-hidden shadow-md hover:shadow-xl relative">
                    <div class="flex items-center space-x-1 bg-gray-100 font-semibold rounded-full text-sm p-1 absolute mt-1 ml-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="12" r="9"></circle>
                            <polyline points="12 7 12 12 15 15"></polyline>
                        </svg>
                        <span>{{ $item->total_time }}</span>
                    </div>
                    <div class="flex items-center space-x-1 bg-green-600 rounded-full text-sm p-1 absolute right-0 mt-1 ml-1 mr-1">
                        <span>{{ $item->difficulty }}</span>
                    </div>
                    <img class="object-cover h-36 w-full" src="{{ asset('storage/'.$item->image_path) }}" alt="">
                    <div>
                        <span class="font-bold text-2xl">{{ $item->name }}</span>
                        <span class="block text-gray-500 text-sm">Recipe By: {{ $item->user_name }}</span>
                    </div>
                </div>
            @endforeach

        </div>
        
    <div class="relative flex py-5 items-center">
        <div class="flex-grow border-t border-gray-400"></div>
        <span class="flex-shrink mx-4 text-gray-400">Recent Uploads</span>
        <div class="flex-grow border-t border-gray-400"></div>
    </div>
        
        
    </div>
@endsection
