<div class="modal-body modal-medium">
    <div class="custom-form">
        <div class="input-group w-auto d-flex justify-content-bottom" style="align-items: center;">
            <div class="col-sm-10">
                <label>Ajouter un lien<span class="dec-icon"><i class="far fa-video"></i></span></label>
                <input id="video_link" name="video_link" type="text" placeholder="" value="">
            </div>
            <button class="validate_link btn btn-primary" data-salleid="{{$salle_id}}" type="button">
                <i data-salleid="{{$salle_id}}" class="fas fa-paper-plane" style="font-size: 20px; color: #ffffff;"></i>
            </button>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
        </thead>
        <tbody>
          @foreach($videoSalles as $videoSalleIt)
          <tr>
            <td>{{$videoSalleIt->lien_video}}</td>
            <td style="padding: 3px;">
              <button data-videoid="{{$videoSalleIt->id}}" data-salleid="{{$salle_id}}" type="button" class="delete-curr-video btn btn-danger" style="margin-top: 0;"><i data-videoid="{{$videoSalleIt->id}}" data-salleid="{{$salle_id}}" class="far fa-trash-alt"></i></button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>
<script>
    // $(document).ready(function() {
    //     // Reload and reevaluate the JavaScript file when the view is reloaded
    //     var jsUrl = '/js/plugins.js';
    //     reloadJSFile(jsUrl);
    // });
    $(document).ready(function() {
        $('.validate_link').click(function() {
            // Display confirm dialog
            var videolink = $("#video_link").val();
            
            // If user confirms
            if (videolink != "") {
                // Get data attributes
                var salleId = $(this).data('salleid');

                // Send POST request
                $.ajax({
                    url: '/api/validate/videosalle',
                    type: 'POST',
                    data: {
                        "_token": "{{csrf_token()}}",
                        salleId: salleId,
                        videolink: videolink,
                        uid: "{{$authuser}}",
                    },
                    success: function(response) {
                        // Handle success response
                        //console.log('Request sent successfully:', response);
                        $.ajax({
                            url: '/api/render/video/salles?salle_id=' + salleId+'&u_id={{$authuser}}',
                            method: 'GET',
                            success: function(data) {
                                // Handle successful response
                                $("#video-atito-content").html(data);
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

        $('.delete-curr-video').click(function() {
            // Display confirm dialog
            var isConfirmed = confirm('Vous êtes sur de vouloir supprimé?');
            
            // If user confirms
            if (isConfirmed) {
                // Get data attributes
                var videoid = $(this).data('videoid');
                var salleId = $(this).data('salleid');

                // Send POST request
                $.ajax({
                    url: '/api/delete/videosalle',
                    type: 'POST',
                    data: {
                        "_token": "{{csrf_token()}}",
                        videoid: videoid,
                        salleId: salleId,
                        uid: "{{$authuser}}",
                    },
                    success: function(response) {
                        // Handle success response
                        //console.log('Request sent successfully:', response);
                        $.ajax({
                            url: '/api/render/video/salles?salle_id=' + salleId+'&u_id={{$authuser}}',
                            method: 'GET',
                            success: function(data) {
                                // Handle successful response
                                $("#video-atito-content").html(data);
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