<x-app-layout>
    <a href="{{ route('change.language', 'fr') }}" style="color: white">Français</a>
    <a href="{{ route('change.language', 'en') }}" style="color: white">Anglais</a>

    {{--Component alerte --}}
    <x-alert :color="'bg-yellow-500'" :message="'Vous n\'avez pas saisi le nom d\'utilisateur'"/>
    <x-alert :color="'bg-indigo-700'"   :message="'Ce champ est requis'"/>
    
    {{--Component Card --}}
    {{-- <x-card>
        <h3>Titre de la carte n*1</h3>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum excepturi facere soluta ea, quod nemo suscipit, cumque incidunt beatae, natus saepe velit sed.
        </p>
    </x-card>
    <x-card>
        <h3>Titre de la carte n*2</h3>
        <img src="https://unsplash.it/300/200" alt="image">
    </x-card> --}}

    {{-- <p> {{route('chirps.index')}}</p>
    <p> {{route('chirps.store')}}</p>
    <p> {{action(ChirpController::class, 'index')}}</p>
    <p> {{url('profile/user')}}</p> --}}

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form action="{{ route('chirps.update', $chirp) }}" method="POST">
            @csrf
            @method('PATCH')
            <textarea name="message" placeholder="{{ __('util.msg') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('message' , $chirp->message) }}
            </textarea>

            <x-input-error :messages="$errors->get('message')" class="mt-2" />

            <x-primary-button class="mt-4"> 
                {{ __('util.chirp') }}
            </x-primary-button>
            <x-primary-button class="mt-4"> 
                {{ __('Mettre à jour') }}
            </x-primary-button>
            <a href="{{ route('chirps.index') }}" class="mt-4">
            {{ __('Annuler') }}</a>
        </form>
        <pre>{{ $chirp }}</pre>
    </div>

</x-app-layout>
  