<div class="modal-body modal-medium">
    <div class="lsingle-block-box no-padding lfacts-block">
        <div class="lsingle-block-content">
            <div class="lsingle-facts four-cols">
                <!-- inline-facts -->
                @foreach($photosSalles as $photosSalleIt)
                <div class="inline-facts-wrap flex-fact-wrap">
                    <div class="box-item">
                        
                        <img style="width: 100px; height: 78px;" width="1200" height="800" class="attachment-homeradar-gallery-one size-homeradar-gallery-one lazy loaded" alt="" data-src="{{asset('storage/'.str_replace('public/', '', $photosSalleIt->photo))}}" data-lazy="{{asset('storage/'.str_replace('public/', '', $photosSalleIt->photo))}}" src="{{asset('storage/'.str_replace('public/', '', $photosSalleIt->photo))}}" data-was-processed="true"> 
                        <a href="{{asset('storage/'.str_replace('public/', '', $photosSalleIt->photo))}}"  data-toggle="lightbox" class="gal-link popup-image" style="left: 15%; top:30%;">
                            <i class="fal fa-eye"></i>
                        </a>
                        <a href="#" data-photoid="{{$photosSalleIt->id}}" data-salleid="{{optional($photosSalleIt->salles)->first()->id??0}}" class="gal-link popup-image deletephotosalle" style="left: 55%; top:30%;">
                            <i  data-photoid="{{$photosSalleIt->id}}" data-salleid="{{optional($photosSalleIt->salles)->first()->id??0}}" class="fal fa-trash"></i>
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

        var salleId = $(this).data('salleid');
        
        // Create a FormData object and append the file and salleId
        var formData = new FormData();
        //console.log(file.name)
        formData.append('photosalle', file);
        formData.append('photosalle_name', file.name);
        formData.append('salleid', salleId);

        // Send POST request using AJAX
        $.ajax({
            url: '/api/upload/photosalle',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Handle success response
                $.ajax({
                    url: '/api/render/photo/salles?salle_id=' + salleId,
                    method: 'GET',
                    success: function(data) {
                        // Handle successful response
                        $("#photo-atito-content").html(data);
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(xhr.responseText);
                    }
                });
                // Optionally, you can perform additional actions here after the upload is successful
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error('Error uploading file:', error);
                // Optionally, you can handle the error and provide feedback to the user
            }
        });
    });

    $(document).ready(function() {
        $('.deletephotosalle').click(function() {
            // Display confirm dialog
            var isConfirmed = confirm('Vous êtes sur de vouloir supprimé?');
            
            // If user confirms
            if (isConfirmed) {
                // Get data attributes
                var photoId = $(this).data('photoid');
                var salleId = $(this).data('salleid');

                // Send POST request
                $.ajax({
                    url: '/api/delete/photosalle',
                    type: 'POST',
                    data: {
                        "_token": "{{csrf_token()}}",
                        photoId: photoId,
                        salleId: salleId
                    },
                    success: function(response) {
                        // Handle success response
                        //console.log('Request sent successfully:', response);
                        $.ajax({
                            url: '/api/render/photo/salles?salle_id=' + salleId,
                            method: 'GET',
                            success: function(data) {
                                // Handle successful response
                                $("#photo-atito-content").html(data);
                            },
                            error: function(xhr, status, error) {
                                // Handle error
                                console.error(xhr.responseText);
                            }
                        });
                        // Optionally, you can perform additional actions here after the request is successful
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        console.error('Error sending request:', error);
                        // Optionally, you can handle the error and provide feedback to the user
                    }
                });
            }
        });
    });

</script>
<script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js"></script>