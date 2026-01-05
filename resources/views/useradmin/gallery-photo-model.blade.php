<div class="modal-body modal-medium">
    <div class="lsingle-block-box no-padding lfacts-block">
        <div class="lsingle-block-content">
            <div class="lsingle-facts four-cols">
                <!-- inline-facts -->
                @foreach($photosSalles as $photosSalleIt)
                <div class="inline-facts-wrap flex-fact-wrap">
                    <div class="box-item">
                        @php
                            $photoPath = asset('storage/'.str_replace('public/', '', $photosSalleIt->photo));
                        @endphp
                        <img 
                            style="width: 100px; height: 78px; object-fit: cover; background-color: #f0f0f0;" 
                            width="1200" 
                            height="800" 
                            class="attachment-homeradar-gallery-one size-homeradar-gallery-one lazy loaded" 
                            alt="Photo de la salle" 
                            data-src="{{$photoPath}}" 
                            data-lazy="{{$photoPath}}" 
                            src="{{$photoPath}}" 
                            data-was-processed="true"
                            onerror="this.onerror=null; this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9Ijc4IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxyZWN0IHdpZHRoPSIxMDAiIGhlaWdodD0iNzgiIGZpbGw9IiNlMGUwZTAiLz48dGV4dCB4PSI1MCUiIHk9IjUwJSIgZm9udC1mYW1pbHk9IkFyaWFsIiBmb250LXNpemU9IjE0IiBmaWxsPSIjOTk5IiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBkeT0iLjNlbSI+SW1hZ2UgZXJyb3VyPC90ZXh0Pjwvc3ZnPg=='; this.style.backgroundColor='#f0f0f0'; this.alt='Image non disponible';">
                        <a href="{{$photoPath}}" data-toggle="lightbox" class="gal-link popup-image" style="left: 15%; top:30%;" title="Voir l'image">
                            <i class="fal fa-eye"></i>
                        </a>
                        <a href="#" data-photoid="{{$photosSalleIt->id}}" data-salleid="{{optional($photosSalleIt->salles)->first()->id??0}}" class="gal-link popup-image deletephotosalle" style="left: 55%; top:30%;" title="Supprimer">
                            <i data-photoid="{{$photosSalleIt->id}}" data-salleid="{{optional($photosSalleIt->salles)->first()->id??0}}" class="fal fa-trash"></i>
                        </a>
                    </div>
                </div>
                @endforeach
                <div class="inline-facts-wrap flex-fact-wrap">
                    <div class="box-item" style="text-align: left;margin: 10% 0;">
                        <a href="#" data-salleid="{{$salle_id}}" class="popup-image" style="left: 29%;top: 0;">
                            <input type="file" data-salleid="{{$salle_id}}" id="file_nput_photo" accept="image/*" style="display: none;">
                            <i data-salleid="{{$salle_id}}" class="fas fa-plus addphotosalle" style="font-size: 53px;color: #0971a8;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // $(document).ready(function() {
    //     // Reload and reevaluate the JavaScript file when the view is reloaded
    //     var jsUrl = '/js/plugins.js';
    //     reloadJSFile(jsUrl);
    // });
    $('.addphotosalle').click(function() {
        // Trigger click event on the file input
        $('#file_nput_photo').get(0).click();
    });

    $('#file_nput_photo').change(function() {
        // Get the selected file
        var file = this.files[0];
        
        if (!file) {
            return;
        }

        var salleId = $(this).data('salleid');
        
        // Create a FormData object and append the file and salleId
        var formData = new FormData();
        formData.append('photosalle', file);
        formData.append('photosalle_name', file.name);
        formData.append('salleid', salleId);

        // Afficher un indicateur de chargement (optionnel)
        var $addButton = $('.addphotosalle[data-salleid="' + salleId + '"]');
        var originalHtml = $addButton.html();
        $addButton.html('<i class="fas fa-spinner fa-spin" style="font-size: 53px;color: #0971a8;"></i>').prop('disabled', true);

        // Send POST request using AJAX
        $.ajax({
            url: '/api/upload/photosalle',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            timeout: 60000, // 60 secondes pour l'upload
            success: function(response) {
                // Recharger les photos
                $.ajax({
                    url: '/api/render/photo/salles?salle_id=' + salleId + '&u_id={{$authuser}}',
                    method: 'GET',
                    timeout: 30000,
                    success: function(data) {
                        $("#photo-atito-content").html(data);
                        $addButton.html(originalHtml).prop('disabled', false);
                    },
                    error: function(xhr, status, error) {
                        console.error('Erreur lors du rechargement:', xhr.responseText);
                        alert('Image uploadée mais erreur lors du rechargement. Veuillez actualiser la page.');
                        $addButton.html(originalHtml).prop('disabled', false);
                    }
                });
            },
            error: function(xhr, status, error) {
                $addButton.html(originalHtml).prop('disabled', false);
                var errorMsg = "Erreur lors de l'upload de l'image.";
                
                if (status === "timeout") {
                    errorMsg = "Le téléchargement a pris trop de temps. Veuillez réessayer avec une image plus petite.";
                } else if (xhr.status === 0) {
                    errorMsg = "Pas de connexion internet. Vérifiez votre connexion réseau.";
                } else if (xhr.status === 413) {
                    errorMsg = "L'image est trop volumineuse. Veuillez choisir une image plus petite.";
                } else if (xhr.status >= 500) {
                    errorMsg = "Erreur serveur. Veuillez réessayer plus tard.";
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMsg = xhr.responseJSON.message;
                }
                
                alert(errorMsg);
                console.error('Erreur upload:', status, error, xhr.responseText);
            }
        });
        
        // Réinitialiser l'input file
        $(this).val('');
    });

    $(document).ready(function() {
        $('.deletephotosalle').click(function(e) {
            e.preventDefault();
            
            // Display confirm dialog
            var isConfirmed = confirm('Êtes-vous sûr de vouloir supprimer cette image?');
            
            // If user confirms
            if (isConfirmed) {
                // Get data attributes
                var photoId = $(this).data('photoid');
                var salleId = $(this).data('salleid');
                var $deleteBtn = $(this);
                var originalHtml = $deleteBtn.html();
                
                // Afficher un indicateur de chargement
                $deleteBtn.html('<i class="fas fa-spinner fa-spin"></i>').css('pointer-events', 'none');

                // Send POST request
                $.ajax({
                    url: '/api/delete/photosalle',
                    type: 'POST',
                    data: {
                        "_token": "{{csrf_token()}}",
                        photoId: photoId,
                        salleId: salleId,
                        uid: "{{$authuser}}",
                    },
                    timeout: 30000,
                    success: function(response) {
                        // Recharger les photos
                        $.ajax({
                            url: '/api/render/photo/salles?salle_id=' + salleId + '&u_id={{$authuser}}',
                            method: 'GET',
                            timeout: 30000,
                            success: function(data) {
                                $("#photo-atito-content").html(data);
                            },
                            error: function(xhr, status, error) {
                                console.error('Erreur lors du rechargement:', xhr.responseText);
                                alert('Image supprimée mais erreur lors du rechargement. Veuillez actualiser la page.');
                                $deleteBtn.html(originalHtml).css('pointer-events', 'auto');
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        $deleteBtn.html(originalHtml).css('pointer-events', 'auto');
                        var errorMsg = "Erreur lors de la suppression de l'image.";
                        
                        if (status === "timeout") {
                            errorMsg = "La suppression a pris trop de temps. Vérifiez votre connexion internet.";
                        } else if (xhr.status === 0) {
                            errorMsg = "Pas de connexion internet. Vérifiez votre connexion réseau.";
                        } else if (xhr.status >= 500) {
                            errorMsg = "Erreur serveur. Veuillez réessayer plus tard.";
                        } else if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMsg = xhr.responseJSON.message;
                        }
                        
                        alert(errorMsg);
                        console.error('Erreur suppression:', status, error, xhr.responseText);
                    }
                });
            }
        });
    });

</script>
<script>
    // Charger bs5-lightbox avec gestion d'erreur
    (function() {
        var script = document.createElement('script');
        script.src = 'https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js';
        script.onerror = function() {
            console.warn('bs5-lightbox n\'a pas pu être chargé depuis le CDN. Les fonctionnalités de lightbox peuvent ne pas fonctionner.');
            // Fallback: utiliser une solution basique ou désactiver lightbox
        };
        document.head.appendChild(script);
    })();
</script>