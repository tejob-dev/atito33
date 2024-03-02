@php $editing = isset($salle) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="type"
            label="Type"
            :value="old('type', ($editing ? $salle->type : ''))"
            maxlength="255"
            placeholder="Type"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="nom_salle"
            label="Nom Salle"
            :value="old('nom_salle', ($editing ? $salle->nom_salle : ''))"
            maxlength="255"
            placeholder="Nom Salle"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="adresse_salle"
            label="Adresse Salle"
            :value="old('adresse_salle', ($editing ? $salle->adresse_salle : ''))"
            maxlength="255"
            placeholder="Adresse Salle"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="presentation_salle"
            label="Presentation Salle"
            maxlength="255"
            >{{ old('presentation_salle', ($editing ? $salle->presentation_salle
            : '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="capacite_salle"
            label="Capacite Salle"
            :value="old('capacite_salle', ($editing ? $salle->capacite_salle : ''))"
            max="255"
            placeholder="Capacite Salle"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="tarif_salle"
            label="Tarif Salle"
            :value="old('tarif_salle', ($editing ? $salle->tarif_salle : ''))"
            maxlength="255"
            placeholder="Tarif Salle"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="acces_salle"
            label="Acces Salle"
            :value="old('acces_salle', ($editing ? $salle->acces_salle : ''))"
            maxlength="255"
            placeholder="Acces Salle"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="logistique_salle"
            label="Logistique Salle"
            :value="old('logistique_salle', ($editing ? $salle->logistique_salle : ''))"
            maxlength="255"
            placeholder="Logistique Salle"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="telephone"
            label="Telephone"
            :value="old('telephone', ($editing ? $salle->telephone : ''))"
            maxlength="255"
            placeholder="Telephone"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="tel_whatsapp"
            label="Tel Whatsapp"
            :value="old('tel_whatsapp', ($editing ? $salle->tel_whatsapp : ''))"
            maxlength="255"
            placeholder="Tel Whatsapp"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="email_salle"
            label="Email Salle"
            :value="old('email_salle', ($editing ? $salle->email_salle : ''))"
            maxlength="255"
            placeholder="Email Salle"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="facebook_salle"
            label="Facebook Salle"
            :value="old('facebook_salle', ($editing ? $salle->facebook_salle : ''))"
            maxlength="255"
            placeholder="Facebook Salle"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="site_internet"
            label="Site Internet"
            :value="old('site_internet', ($editing ? $salle->site_internet : ''))"
            maxlength="255"
            placeholder="Site Internet"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.datetime
            name="date_salle"
            label="Date Salle"
            value="{{ old('date_salle', ($editing ? optional($salle->date_salle)->format('Y-m-d\TH:i:s') : '')) }}"
            max="255"
        ></x-inputs.datetime>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.checkbox
            name="validated"
            label="Validated"
            :checked="old('validated', ($editing ? $salle->validated : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.checkbox
            name="promoted"
            label="Promoted"
            :checked="old('promoted', ($editing ? $salle->promoted : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="commune_id" label="Commune">
            @php $selected = old('commune_id', ($editing ? $salle->commune_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Commune</option>
            @foreach($communes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="ville_id" label="Ville">
            @php $selected = old('ville_id', ($editing ? $salle->ville_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Ville</option>
            @foreach($villes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="quartier_id" label="Quartier">
            @php $selected = old('quartier_id', ($editing ? $salle->quartier_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Quartier</option>
            @foreach($quartiers as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
