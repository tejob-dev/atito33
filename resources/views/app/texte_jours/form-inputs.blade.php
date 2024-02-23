@php $editing = isset($texteJour) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="libelle"
            label="Libelle"
            :value="old('libelle', ($editing ? $texteJour->libelle : ''))"
            maxlength="255"
            placeholder="Libelle"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea name="texte" label="Texte" maxlength="255" required
            >{{ old('texte', ($editing ? $texteJour->texte : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <div
            x-data="imageViewer('{{ $editing && $texteJour->photo ? \Storage::url($texteJour->photo) : '' }}')"
        >
            <x-inputs.partials.label
                name="photo"
                label="Photo"
            ></x-inputs.partials.label
            ><br />

            <!-- Show the image -->
            <template x-if="imageUrl">
                <img
                    :src="imageUrl"
                    class="object-cover rounded border border-gray-200"
                    style="width: 100px; height: 100px;"
                />
            </template>

            <!-- Show the gray box when image is not available -->
            <template x-if="!imageUrl">
                <div
                    class="border rounded border-gray-200 bg-gray-100"
                    style="width: 100px; height: 100px;"
                ></div>
            </template>

            <div class="mt-2">
                <input
                    type="file"
                    name="photo"
                    id="photo"
                    @change="fileChosen"
                />
            </div>

            @error('photo') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="fonction_texte"
            label="Fonction Texte"
            :value="old('fonction_texte', ($editing ? $texteJour->fonction_texte : ''))"
            maxlength="255"
            placeholder="Fonction Texte"
        ></x-inputs.text>
    </x-inputs.group>
</div>
