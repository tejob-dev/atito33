@php $editing = isset($commune) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="nom_commune"
            label="Nom Commune"
            :value="old('nom_commune', ($editing ? $commune->nom_commune : ''))"
            maxlength="255"
            placeholder="Nom Commune"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="ville_id" label="Ville" required>
            @php $selected = old('ville_id', ($editing ? $commune->ville_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Ville</option>
            @foreach($villes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
