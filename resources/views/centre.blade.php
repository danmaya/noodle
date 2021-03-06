@extends('layouts.app')

@section("content")
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">
        <div class="flex justify-center flex-wrap bg-gray-200 p-4 mt-5">
            <div class="text-center">
                <h1 class="mb-10 text-2xl">{{ __("Llistat d'centres") }}</h1>
                <a href="{{ route("centre.create") }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                    {{ __("Afegir centre") }}
                </a>
                <a href="{{ url()->previous() }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Tornar</a>
            </div>
        </div>

        <table class="border-separate border-2 text-center border-gray-500 mt-3" style="width: 100%">
            <thead>
            <tr>
                <th class="px-4 py-2">{{ __("Id") }}</th>
                <th class="px-4 py-2">{{ __("Nom") }}</th>
                <th class="px-4 py-2">{{ __("Accions") }}</th>
            </tr>
            </thead>
            <tbody>
                @forelse($centres as $centre)
                    <tr>
                        <td class="border px-4 py-2">{{ $centre->id }}</td>
                        <td class="border px-4 py-2">{{ $centre->nom }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route("centre.edit", ["centre" => $centre]) }}" class="text-blue-400">{{ __("Editar") }}</a> |
                            <a
                                href="#"
                                class="text-red-400"
                                onclick="event.preventDefault();
                                    document.getElementById('delete-project-{{ $centre->id }}-form').submit();"
                            >{{ __("Eliminar") }}
                            </a>
                            <form id="delete-project-{{ $centre->id }}-form" action="{{ route("centre.destroy", ["centre" => $centre]) }}" method="POST" class="hidden">
                                @method("DELETE")
                                @csrf
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <p><strong class="font-bold">{{ __("No hi ha centres") }}</strong></p>
                                <span class="block sm:inline">{{ __("No hi ha cap dada a mostrar") }}</span>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if($centres->count())
            <div class="mt-3">
                {{ $centres->links() }}
            </div>
        @endif
    </div>
</main>

@endsection