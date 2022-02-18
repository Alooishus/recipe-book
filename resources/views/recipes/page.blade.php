@extends('layouts.main')

@section('content')
    
<div class="flex flex-grow">
    <div>
        <img class="object-cover h-36 w-full" src="{{ asset('storage/'.$recipe[0]->image_path) }}" alt="">

        <div>{{  $recipe[0]->name }}</div>
        <div>{{  $recipe[0]->difficulty }}</div>
        <div>{{  str_replace('-', ' hours ', $recipe[0]->total_time) }} minutes</div>
        @foreach ($lines as $item)
        <div>
            {{ $item->quantity }}
            {{ $item->unit }}
            {{ $item->ingredient }}
        </div>
        @endforeach
        <div><pre class="font-playfair">{{ $recipe[0]->method }}</pre></div>
    </div>
</div>



@endsection