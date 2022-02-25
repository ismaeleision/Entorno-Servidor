<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Productos') }}
      <a href="/dashboard/servicios/create">
        <x-button class="ml-3">
          {{ __('Carrito ') }}
        </x-button>
      </a>
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200 justify-content-center align-content-center">
          @foreach($productos as $producto)
          <div class="border border-black-500 w-sm">
            <img src="{{$producto->imagen}}">
            <h3>{{$producto->nombre}}</h3>
            <p>{{$producto->precio}}€</p>
            <p>{{$producto->descripcion}}</p>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</x-app-layout>