<div class="w-full">
    <div class="flex flex-wrap">
        <h1 class="mb-5 w-full">
            {{ $title }}
            <a href="{{ route('alumne.index') }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 float-right">Tornar</a>
        </h1>
    </div>
</div>

<form class="w-full" method="POST" action="{{ $route }}">
    @csrf
    @isset($update)
        @method("PUT")
    @endisset
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nom">
                {{ __("Nom") }}
            </label>
            <input name="nom" value="{{ old("nom") ?? $alumne->nom }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="name" type="text">
            <p class="text-gray-600 text-xs italic">{{ __("Nombre de l'alumne") }}</p>
            @error("nom")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="cognoms">
                {{ __("Cognoms") }}
            </label>
            <input name="cognoms" value="{{ old("cognoms") ?? $alumne->cognoms }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="cognoms" type="text">
            <p class="text-gray-600 text-xs italic">{{ __("Cognoms de l'alumne") }}</p>
            @error("cognoms")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="data_naixement">
                {{ __("Data naixement") }}
            </label>
            <input name="data_naixement" value="{{ old("data_naixement") ?? $alumne->data_naixement }}" class="appearance-none block bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="data_naixement" type="date">
            <p class="text-gray-600 text-xs italic">{{ __("Data de naixement") }}</p>
            @error("data_naixement")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="centre_id">
                {{ __("Centre") }}
            </label>
            <div class="relative">
                <select name="centre_id" value="{{ old("centre_id") ?? $alumne->centre_id }}" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 mb-3 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option value="">Sense centre assignat</option>
                    @foreach ($centres as $centre)
                       <option value="{{ $centre->id }}" {{ $centre->id == $alumne->centre_id ? 'selected' : '' }}>{{ $centre->nom }}</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
            <p class="text-gray-600 text-xs italic">{{ __("Centre d'estudis") }}</p>
            @error("centre_id")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="ensenyament_id">
                {{ __("Ensenyament") }}
            </label>
            <div class="relative">
                <select name="ensenyament_id" value="{{ old("ensenyament_id") ?? $alumne->ensenyament_id }}" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 mb-3 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option value="">Sense ensenyament assignat</option>
                    @foreach ($ensenyaments as $ensenyament)
                       <option value="{{ $ensenyament->id }}" {{ $ensenyament->id == $alumne->ensenyament_id ? 'selected' : '' }}>{{ $ensenyament->nom }}</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
            <p class="text-gray-600 text-xs italic">{{ __("Ensenyament de l'alumne") }}</p>
            @error("ensenyament_id")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="md:flex md:items-center">
        <div class="md:w-1/3">
            <button class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                {{ $textButton }}
            </button>
        </div>
    </div>
</form>