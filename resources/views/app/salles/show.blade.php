<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.salles.show_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <x-slot name="title">
                    <a href="{{ route('salles.index') }}" class="mr-4"
                        ><i class="mr-1 icon ion-md-arrow-back"></i
                    ></a>
                </x-slot>

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.salles.inputs.type')
                        </h5>
                        <span>{{ $salle->type ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.salles.inputs.nom_salle')
                        </h5>
                        <span>{{ $salle->nom_salle ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.salles.inputs.adresse_salle')
                        </h5>
                        <span>{{ $salle->adresse_salle ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.salles.inputs.presentation_salle')
                        </h5>
                        <span>{{ $salle->presentation_salle ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.salles.inputs.capacite_salle')
                        </h5>
                        <span>{{ $salle->capacite_salle ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.salles.inputs.tarif_salle')
                        </h5>
                        <span>{{ $salle->tarif_salle ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.salles.inputs.acces_salle')
                        </h5>
                        <span>{{ $salle->acces_salle ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.salles.inputs.logistique_salle')
                        </h5>
                        <span>{{ $salle->logistique_salle ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.salles.inputs.telephone')
                        </h5>
                        <span>{{ $salle->telephone ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.salles.inputs.tel_whatsapp')
                        </h5>
                        <span>{{ $salle->tel_whatsapp ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.salles.inputs.email_salle')
                        </h5>
                        <span>{{ $salle->email_salle ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.salles.inputs.facebook_salle')
                        </h5>
                        <span>{{ $salle->facebook_salle ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.salles.inputs.site_internet')
                        </h5>
                        <span>{{ $salle->site_internet ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.salles.inputs.photo')
                        </h5>
                        <span>{{ $salle->photo ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.salles.inputs.date_salle')
                        </h5>
                        <span>{{ $salle->date_salle ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.salles.inputs.commune_id')
                        </h5>
                        <span
                            >{{ optional($salle->commune)->nom_commune ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.salles.inputs.ville_id')
                        </h5>
                        <span
                            >{{ optional($salle->ville)->nom_ville ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.salles.inputs.quartier_id')
                        </h5>
                        <span
                            >{{ optional($salle->quartier)->nom_quartier ?? '-'
                            }}</span
                        >
                    </div>
                </div>

                <div class="mt-10">
                    <a href="{{ route('salles.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\Salle::class)
                    <a href="{{ route('salles.create') }}" class="button">
                        <i class="mr-1 icon ion-md-add"></i>
                        @lang('crud.common.create')
                    </a>
                    @endcan
                </div>
            </x-partials.card>

            @can('view-any', App\Models\comodite_salle::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Comodites </x-slot>

                <livewire:salle-comodites-detail :salle="$salle" />
            </x-partials.card>
            @endcan
        </div>
    </div>
</x-app-layout>
