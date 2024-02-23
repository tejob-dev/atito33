<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.salles.index_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <div class="mb-5 mt-4">
                    <div class="flex flex-wrap justify-between">
                        <div class="md:w-1/2">
                            <form>
                                <div class="flex items-center w-full">
                                    <x-inputs.text
                                        name="search"
                                        value="{{ $search ?? '' }}"
                                        placeholder="{{ __('crud.common.search') }}"
                                        autocomplete="off"
                                    ></x-inputs.text>

                                    <div class="ml-1">
                                        <button
                                            type="submit"
                                            class="button button-primary"
                                        >
                                            <i class="icon ion-md-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="md:w-1/2 text-right">
                            @can('create', App\Models\Salle::class)
                            <a
                                href="{{ route('salles.create') }}"
                                class="button button-primary"
                            >
                                <i class="mr-1 icon ion-md-add"></i>
                                @lang('crud.common.create')
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="block w-full overflow-auto scrolling-touch">
                    <table class="w-full max-w-full mb-4 bg-transparent">
                        <thead class="text-gray-700">
                            <tr>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.salles.inputs.type')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.salles.inputs.nom_salle')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.salles.inputs.adresse_salle')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.salles.inputs.presentation_salle')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.salles.inputs.capacite_salle')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.salles.inputs.tarif_salle')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.salles.inputs.acces_salle')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.salles.inputs.logistique_salle')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.salles.inputs.telephone')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.salles.inputs.tel_whatsapp')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.salles.inputs.email_salle')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.salles.inputs.facebook_salle')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.salles.inputs.site_internet')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.salles.inputs.photo')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.salles.inputs.date_salle')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.salles.inputs.commune_id')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.salles.inputs.ville_id')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.salles.inputs.quartier_id')
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                            @forelse($salles as $salle)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-left">
                                    {{ $salle->type ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $salle->nom_salle ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $salle->adresse_salle ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $salle->presentation_salle ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $salle->capacite_salle ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $salle->tarif_salle ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $salle->acces_salle ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $salle->logistique_salle ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $salle->telephone ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $salle->tel_whatsapp ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $salle->email_salle ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $salle->facebook_salle ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $salle->site_internet ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $salle->photo ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $salle->date_salle ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ optional($salle->commune)->nom_commune ??
                                    '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ optional($salle->ville)->nom_ville ?? '-'
                                    }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ optional($salle->quartier)->nom_quartier
                                    ?? '-' }}
                                </td>
                                <td
                                    class="px-4 py-3 text-center"
                                    style="width: 134px;"
                                >
                                    <div
                                        role="group"
                                        aria-label="Row Actions"
                                        class="
                                            relative
                                            inline-flex
                                            align-middle
                                        "
                                    >
                                        @can('update', $salle)
                                        <a
                                            href="{{ route('salles.edit', $salle) }}"
                                            class="mr-1"
                                        >
                                            <button
                                                type="button"
                                                class="button"
                                            >
                                                <i
                                                    class="icon ion-md-create"
                                                ></i>
                                            </button>
                                        </a>
                                        @endcan @can('view', $salle)
                                        <a
                                            href="{{ route('salles.show', $salle) }}"
                                            class="mr-1"
                                        >
                                            <button
                                                type="button"
                                                class="button"
                                            >
                                                <i class="icon ion-md-eye"></i>
                                            </button>
                                        </a>
                                        @endcan @can('delete', $salle)
                                        <form
                                            action="{{ route('salles.destroy', $salle) }}"
                                            method="POST"
                                            onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                        >
                                            @csrf @method('DELETE')
                                            <button
                                                type="submit"
                                                class="button"
                                            >
                                                <i
                                                    class="
                                                        icon
                                                        ion-md-trash
                                                        text-red-600
                                                    "
                                                ></i>
                                            </button>
                                        </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="19">
                                    @lang('crud.common.no_items_found')
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="19">
                                    <div class="mt-10 px-4">
                                        {!! $salles->render() !!}
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </x-partials.card>
        </div>
    </div>
</x-app-layout>
