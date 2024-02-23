@php $editing = isset($visite) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.number
            name="counter"
            label="Counter"
            :value="old('counter', ($editing ? $visite->counter : '0'))"
            max="255"
            placeholder="Counter"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="salle_id" label="Salle" required>
            @php $selected = old('salle_id', ($editing ? $visite->salle_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Salle</option>
            @foreach($salles as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
