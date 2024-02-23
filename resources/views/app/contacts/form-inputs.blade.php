@php $editing = isset($contact) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="message"
            label="Message"
            maxlength="255"
            required
            >{{ old('message', ($editing ? $contact->message : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="nom_prenom_c"
            label="Nom Prenom"
            :value="old('nom_prenom_c', ($editing ? $contact->nom_prenom_c : ''))"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="phone"
            label="Phone"
            :value="old('phone', ($editing ? $contact->phone : ''))"
            maxlength="255"
            placeholder="Phone"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.email
            name="email"
            label="Email"
            :value="old('email', ($editing ? $contact->email : ''))"
            maxlength="255"
            placeholder="Email"
            required
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="compte_id" label="Compte" required>
            @php $selected = old('compte_id', ($editing ? $contact->compte_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Compte</option>
            @foreach($comptes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
