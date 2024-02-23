@php $editing = isset($quartier) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="nom_quartier"
            label="Nom Quartier"
            :value="old('nom_quartier', ($editing ? $quartier->nom_quartier : ''))"
            maxlength="255"
            placeholder="Nom Quartier"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="commune_id" label="Commune" required>
            @php $selected = old('commune_id', ($editing ? $quartier->commune_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Commune</option>
            @foreach($communes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
