@php $editing = isset($compte) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="nom_compte"
            label="Nom Compte"
            :value="old('nom_compte', ($editing ? $compte->nom_compte : ''))"
            maxlength="255"
            placeholder="Nom Compte"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="prenom_compte"
            label="Prenom Compte"
            :value="old('prenom_compte', ($editing ? $compte->prenom_compte : ''))"
            maxlength="255"
            placeholder="Prenom Compte"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="telephone_compte"
            label="Telephone Compte"
            :value="old('telephone_compte', ($editing ? $compte->telephone_compte : ''))"
            maxlength="255"
            placeholder="Telephone Compte"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="whatsapp_compte"
            label="Whatsapp Compte"
            :value="old('whatsapp_compte', ($editing ? $compte->whatsapp_compte : ''))"
            maxlength="255"
            placeholder="Whatsapp Compte"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="adresse_compte"
            label="Adresse Compte"
            :value="old('adresse_compte', ($editing ? $compte->adresse_compte : ''))"
            maxlength="255"
            placeholder="Adresse Compte"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="nom_entreprise"
            label="Nom Entreprise"
            :value="old('nom_entreprise', ($editing ? $compte->nom_entreprise : ''))"
            maxlength="255"
            placeholder="Nom Entreprise"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="siteweb_compte"
            label="Siteweb Compte"
            :value="old('siteweb_compte', ($editing ? $compte->siteweb_compte : ''))"
            maxlength="255"
            placeholder="Siteweb Compte"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="activite_compte"
            label="Activite Compte"
            :value="old('activite_compte', ($editing ? $compte->activite_compte : ''))"
            maxlength="255"
            placeholder="Activite Compte"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <div
            x-data="imageViewer('{{ $editing && $compte->photo ? \Storage::url($compte->photo) : '' }}')"
        >
            <x-inputs.partials.label
                name="photo"
                label="Photo Compte"
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

            @error('photo')
            @include('components.inputs.partials.error') @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <div
            x-data="imageViewer('{{ $editing && $compte->logo_entreprise ? \Storage::url($compte->logo_entreprise) : '' }}')"
        >
            <x-inputs.partials.label
                name="logo_entreprise"
                label="Logo Entreprise"
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
                    name="logo_entreprise"
                    id="logo_entreprise"
                    @change="fileChosen"
                />
            </div>

            @error('logo_entreprise')
            @include('components.inputs.partials.error') @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $compte->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
