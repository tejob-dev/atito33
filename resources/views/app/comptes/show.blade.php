<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.comptes.show_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <x-slot name="title">
                    <a href="{{ route('comptes.index') }}" class="mr-4"
                        ><i class="mr-1 icon ion-md-arrow-back"></i
                    ></a>
                </x-slot>

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.comptes.inputs.nom_compte')
                        </h5>
                        <span>{{ $compte->nom_compte ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.comptes.inputs.prenom_compte')
                        </h5>
                        <span>{{ $compte->prenom_compte ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.comptes.inputs.telephone_compte')
                        </h5>
                        <span>{{ $compte->telephone_compte ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.comptes.inputs.whatsapp_compte')
                        </h5>
                        <span>{{ $compte->whatsapp_compte ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.comptes.inputs.adresse_compte')
                        </h5>
                        <span>{{ $compte->adresse_compte ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.comptes.inputs.nom_entreprise')
                        </h5>
                        <span>{{ $compte->nom_entreprise ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.comptes.inputs.siteweb_compte')
                        </h5>
                        <span>{{ $compte->siteweb_compte ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.comptes.inputs.activite_compte')
                        </h5>
                        <span>{{ $compte->activite_compte ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.comptes.inputs.logo_entreprise')
                        </h5>
                        <x-partials.thumbnail
                            src="{{ $compte->logo_entreprise ? \Storage::url($compte->logo_entreprise) : '' }}"
                            size="150"
                        />
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.comptes.inputs.user_id')
                        </h5>
                        <span>{{ optional($compte->user)->name ?? '-' }}</span>
                    </div>
                </div>

                <div class="mt-10">
                    <a href="{{ route('comptes.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\Compte::class)
                    <a href="{{ route('comptes.create') }}" class="button">
                        <i class="mr-1 icon ion-md-add"></i>
                        @lang('crud.common.create')
                    </a>
                    @endcan
                </div>
            </x-partials.card>
        </div>
    </div>
</x-app-layout>
