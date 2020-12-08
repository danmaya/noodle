@extends('layouts.app')

@section("content")
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">
        <div class="flex justify-center flex-wrap bg-gray-200 p-4 mt-5">
            <div class="text-center">
                <h1 class="mb-10 text-2xl">{{ __("Llistat d'alumnes") }}</h1>
                <a href="{{ route("alumne.create") }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                    {{ __("Afegir alumne") }}
                </a>
                <a href="{{ route('home') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Tornar</a>
            </div>
        </div>

        <table class="border-separate border-2 text-center border-gray-500 mt-3" style="width: 100%">
            <thead>
            <tr>
                <th class="px-4 py-2">{{ __("Id") }}</th>
                <th class="px-4 py-2">{{ __("Nom") }}</th>
                <th class="px-4 py-2">{{ __("Cognoms") }}</th>
                <th class="px-4 py-2">{{ __("Data naixement") }}</th>
                <th class="px-4 py-2">{{ __("Accions") }}</th>
            </tr>
            </thead>
            <tbody>
                @forelse($alumnes as $alumne)
                    <tr>
                        <td class="border px-4 py-2">{{ $alumne->id }}</td>
                        <td class="border px-4 py-2">{{ $alumne->nom }}</td>
                        <td class="border px-4 py-2">{{ $alumne->cognoms }}</td>
                        <td class="border px-4 py-2">{{ date_format(new DateTime($alumne->data_naixement), "d/m/Y") }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route("alumne.edit", ["alumne" => $alumne]) }}" class="text-blue-400">{{ __("Editar") }}</a> |
                            <a
                                href="#"
                                class="text-red-400"
                                onclick="event.preventDefault();
                                    document.getElementById('delete-project-{{ $alumne->id }}-form').submit();"
                            >{{ __("Eliminar") }}
                            </a>
                            <form id="delete-project-{{ $alumne->id }}-form" action="{{ route("alumne.destroy", ["alumne" => $alumne]) }}" method="POST" class="hidden">
                                @method("DELETE")
                                @csrf
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <p><strong class="font-bold">{{ __("No hi ha alumnes") }}</strong></p>
                                <span class="block sm:inline">{{ __("No hi ha cap dada a mostrar") }}</span>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if($alumnes->count())
            <div class="mt-3">
                {{ $alumnes->links() }}
            </div>
        @endif
    </div>
</main>

@endsection