@extends('layouts/app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Make edits...
            </h1>
        </div>    
    </div>

    <div class="flex justify-center pt-20">
        <form action="/cars/{{ $car->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="block">
                {{-- Name --}}
                <input 
                type="text" 
                class="block shadow-5xl mb-10 p-2 w-80 italic"
                name="name"
                value="{{ $car->name }}">
                
                {{-- Founded --}}
                <input 
                type="text" 
                class="block shadow-5xl mb-10 p-2 w-80 italic"
                name="founded"
                value="{{ $car->founded }}">

                {{-- Description --}}
                <textarea 
                type="text" 
                class="block shadow-5xl mb-10 p-2 w-80 italic"
                name="description"
                rows="5" 
                cols="80">{{ $car->description }}</textarea>

                {{-- Button remember the type =] --}}
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                    Submit
                </button>
            </div>
        </form>
    </div>

@endsection