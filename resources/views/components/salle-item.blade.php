<div class="listing-item">
    <article class="geodir-category-listing fl-wrap">
        <div class="geodir-category-img fl-wrap">
            <a href="/voir/detail/{{ $salle->id }}/annonce" class="geodir-category-img_item">
                <img src="{{ asset('storage/'.str_replace('public/', '', $salle->photo)) }}" alt="image de salle" style="width: 392px; height:259px; " />
                <div class="overlay"></div>
            </a>
            <div class="geodir-category-location">
                <a href="#" class="single-map-item tolt" data-microtip-position="top-left" data-tooltip="Adresse de l'annonce">
                    @if($salle->commune) <i class="fas fa-map-marker-alt fontawe-icon-size"></i> @endif <span>{{ optional($salle->commune)->nom_commune ?? '' }}</span>
                    @if($salle->ville) <i class="far fa-angle-right fontawe-icon-size"></i> @endif <span>{{ optional($salle->ville)->nom_ville }}</span>
                </a>
            </div>
            <ul class="list-single-opt_header_cat">
                @forelse($salle->typeSalles as $typeSalleId)
                <li><a href="#" class="cat-opt blue-bg">{{ $typeSalleId->libelle }}</a></li>
                @php if($loop->first) break; @endphp
                @empty
                <li>N/A</li>
                @endforelse
            </ul>
            <div class="geodir-category-listing_media-list">
                <span><i class="fas fa-camera"></i> {{ $salle->photosSalles->count() }} </span>
            </div>
        </div>
        <div class="geodir-category-content fl-wrap">
            <h3 class="title-sin_item"><a href="/voir/detail/{{ $salle->id }}/annonce">{!! adjustpresentation2($salle->nom_salle, 33, 33, 1) !!}</a></h3>
            
            <h5 style="height: auto; font-size: 13px; text-align: left; color: #878C9F; white-space: pre-line;">{!! adjustpresentation2($salle->presentation_salle) !!}</h5>

            <div class="geodir-category-footer fl-wrap">
                @php
                $compte = optional($salle->comptes())->with('user')->first() ?? null;
                $user = optional($compte)->user ?? null;
                @endphp
                <a href="/voir/detail/{{ optional($compte)->id }}/utilisateur" class="gcf-company make-space-between-item">
                    <img src="{{ asset('storage/'.str_replace('public/', '', optional($compte)->photo ?? '')) }}" alt=""> 
                        <span class="modal-open" onclick="document.querySelector('#hid_compte_id').value = {{ optional($compte)->id ?? null }};" data-modalid="message-box" data-backmodalid="back-message-box" data-overmodalid="over-message-box"> 
                        <i class="fas fa-mailbox fontawe-icon-size"></i> 
                    Envoyer un message</span> 
                </a>
            </div>
        </div>
    </article>
</div>