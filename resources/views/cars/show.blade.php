@extends('layouts.app')

@section('content')
<div class="m-auto w-4/5 py-24">
    <div class="text-center">
        {{-- Image --}}
        <img 
            src="{{ asset('images/' . $car->image_path) }}" 
            alt="">

        {{-- Car Name --}}
        <h1 class="text-5xl uppercase bold">
            <a href="/cars">{{ $car->name }}</a>
        </h1>
    </div>
    <div class="text-center py-10">
        <div class="m-auto">
            </div>
                <span class="uppercase text-blue-500 font-bold text-xs italic">
                Founded: {{ $car->founded }}
                </span>

            <p class="text-lg text-gray-700 py-6">
                {{ $car->description }}
            </p>
            
            <table class="table-auto">
                <tr class="bg-blue-100">
                    <th class="w-1/4 border-4 border-gray-500">
                        Model
                    </th>
                    <th class="w-1/4 border-4 border-gray-500">
                        Engines
                    </th>
                    <th class="w-1/4 border-4 border-gray-500">
                        Date
                    </th>
                </tr>

                @forelse ($car->CarModels as $model)
                     <tr>
                        <td class="border-4 border-gray-500">
                            {{ $model->model_name }}
                        </td>
                        <td class="border-4 border-gray-500">
                            @foreach ($car->engines as $engine )
                                @if ($model->id == $engine->model_id)
                                {{ $engine->engine_name }}
                                @endif
                            @endforeach
                        </td>
                        <td class="border-4 border-gray-500">
                            @foreach ($car->productionDate as $pd )
                                            @if ($model->id == $pd->model_id )
                                            {{ date('Y', strtotime($pd->created_at)) }}
                                            @endif 
                            @endforeach
                        </td>
                    </tr>
                @empty
                    <p>No car models found</p>
                @endforelse
            </table>   
            
            <p class="text-left">
                Product Types: 
                @forelse ($car->products as $product)
                    {{ $product->name }}
                @empty
                    <p>No car product description </p>
                @endforelse
            </p> 

            <hr class="mt-4 mb-8">
        </div>
    </div>
</div>  
@endsection