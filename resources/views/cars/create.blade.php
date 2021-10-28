@extends('layouts/app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Create car
            </h1>
        </div>    
    </div>

    <div class="flex justify-center pt-20">
        <form action="/cars" method="POST">
            @csrf
            <div class="block">
                {{-- Name --}}
                <input 
                type="text" 
                class="block shadow-5xl mb-10 p-2 w-80 italic"
                name="name"
                placeholder="Brand name...">
                
                {{-- Founded --}}
                <input 
                type="text" 
                class="block shadow-5xl mb-10 p-2 w-80 italic"
                name="founded"
                placeholder="Year it was founded...">

                {{-- Description --}}
                <input 
                type="text" 
                class="block shadow-5xl mb-10 p-2 w-80 italic"
                name="description"
                placeholder="Brief Description...">

                {{-- Button remember the type =] --}}
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                    Submit
                </button>
            </div>
        </form>
    </div>

@endsection