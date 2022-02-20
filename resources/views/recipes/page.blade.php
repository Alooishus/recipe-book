@extends('layouts.main')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 p-8 mb-auto gap-4">
        <div class="flex flex-col md:block md:px-12">
            <h1 class="text-3xl">{{ $recipe[0]->name }}</h1>
            <img class="rounded-lg drop-shadow-md" src="{{ asset('storage/public/'.$recipe[0]->image_path) }}" alt="">
            <div class="md:flex justify-between">
                <div>Difficulty:&ensp;{{  $recipe[0]->difficulty }}</div>
                <div>Total Time:&ensp;{{  str_replace('-', ' hours ', $recipe[0]->total_time) }} minutes</div>
            </div>
        </div>
        <div>
            <div class="relative flex md:py-5">
                <div class="flex-grow border-t border-gray-400 mt-3"></div>
                <span class="flex-shrink mx-4 text-gray-400">Ingredients</span>
                <div class="flex-grow border-t border-gray-400 mt-3"></div>
            </div>
            <div class="block text-center">
                <ul class=" inline-block text-left">
                    @foreach ($lines as $item)
                        <li>{{ $item->quantity }}
                        {{ $item->unit }}
                        {{ $item->ingredient }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="px-12 mb-2 text-center">
        <div class="relative flex py-5">
            <div class="flex-grow border-t border-gray-400 mt-3"></div>
            <span class="flex-shrink mx-4 text-gray-400">Method</span>
            <div class="flex-grow border-t border-gray-400 mt-3"></div>
        </div>
        <div>
            <div><pre class="font-playfair whitespace-pre-wrap">{{ $recipe[0]->method }}</pre></div>
        </div>
    </div>
@endsection