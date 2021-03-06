@extends('layouts/app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
               <a href="/cars">Create car</a> 
            </h1>
        </div>    
    </div>

    <div class="flex justify-center pt-20">
        <form action="/cars" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="block">
                {{-- IMAGE --}}
                <input 
                    type="file" 
                    class="block shadow-5xl mb-10 p-2 w-80 italic"
                    name="image">

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
                <textarea 
                    type="text" 
                    class="block shadow-5xl mb-10 p-2 w-80 italic"
                    name="description"
                    placeholder="Brief Description..."
                    rows="5" cols="80">
                </textarea>

                {{-- Button remember the type =] --}}
                <button 
                    type="submit" class="bg-blue-500 hover:bg-blue-600 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                    Submit
                </button>
            </div>
        </form>
    </div>

    @if ($errors->any())
            <div class="w-4/8 m-auto text-center">
                @foreach ($errors->all() as $error )
                <li class="text-red-500 list-none">
                    {{ $error }}
                </li>   
                @endforeach
            </div>
            
        @endif

@endsection