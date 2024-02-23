@php $editing = isset($ville) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="nom_ville"
            label="Nom Ville"
            :value="old('nom_ville', ($editing ? $ville->nom_ville : ''))"
            maxlength="255"
            placeholder="Nom Ville"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
