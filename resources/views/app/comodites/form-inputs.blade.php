@php $editing = isset($comodite) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="libel"
            label="Libel"
            :value="old('libel', ($editing ? $comodite->libel : ''))"
            maxlength="255"
            placeholder="Libel"
            required
        ></x-inputs.text>
    </x-inputs.group>
    
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="comodite_icon"
            label="Icone de FonteAwesome, Aller: https://fontawesome.com/search?q=&o=r"
            :value="old('comodite_icon', ($editing ? $comodite->comodite_icon : ''))"
            maxlength="255"
            placeholder="ex: fas fa-eye"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
