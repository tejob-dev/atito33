<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.salles.edit_title')
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

                <x-form
                    method="PUT"
                    action="{{ route('salles.update', $salle) }}"
                    class="mt-4"
                >
                    @include('app.salles.form-inputs')

                    <div class="mt-10">
                        <a href="{{ route('salles.index') }}" class="button">
                            <i
                                class="
                                    mr-1
                                    icon
                                    ion-md-return-left
                                    text-primary
                                "
                            ></i>
                            @lang('crud.common.back')
                        </a>

                        <a href="{{ route('salles.create') }}" class="button">
                            <i class="mr-1 icon ion-md-add text-primary"></i>
                            @lang('crud.common.create')
                        </a>

                        <button
                            type="submit"
                            class="button button-primary float-right"
                        >
                            <i class="mr-1 icon ion-md-save"></i>
                            @lang('crud.common.update')
                        </button>
                    </div>
                </x-form>
            </x-partials.card>

            @can('view-any', App\Models\TypeSalle::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Type Salles </x-slot>

                <livewire:salle-type-salles-detail :salle="$salle" />
            </x-partials.card>
            @endcan @can('view-any', App\Models\VideoSalle::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Video Salles </x-slot>

                <livewire:salle-video-salles-detail :salle="$salle" />
            </x-partials.card>
            @endcan @can('view-any', App\Models\PhotosSalle::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Photos Salles </x-slot>

                <livewire:salle-photos-salles-detail :salle="$salle" />
            </x-partials.card>
            @endcan @can('view-any', App\Models\Comodite::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Comodites </x-slot>

                <livewire:salle-comodites-detail :salle="$salle" />
            </x-partials.card>
            @endcan @can('view-any', App\Models\Compte::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Comptes </x-slot>

                <livewire:salle-comptes-detail :salle="$salle" />
            </x-partials.card>
            @endcan
        </div>
    </div>
</x-app-layout>
