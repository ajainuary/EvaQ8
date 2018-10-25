@extends('app')
@section('title', 'Request Help')
@section('content')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCXH2oVFOF_zVHJfPFvKb3e85W3qIy920"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/openlocationcode/1.0.0/openlocationcode.min.js"></script>
    <script type="text/javascript">


      window.onload = function () {

          // This demonstrates displaying a map, getting the location of the
          // user, displaying a marker and the Open Location Code.

          // Normally, you would load the following Javascript in the HEAD section of your page:
          //  https://maps.googleapis.com/maps/api/js
          //  https://cdn.jsdelivr.net/openlocationcode/1.0.0/openlocationcode.min.js
          //  (or obtain your own copy from github.com/google/open-location-code)
          // Here, they are defined as external resources.

          // Do we have geolocation functionality?
          if (!navigator.geolocation) {
              document.getElementById('code-display').innerHTML = 'Geolocation is not supported on this browser';
              return;
          }

          // Create the marker object.
          var marker = null;
          var outline = null;
          // Create the map object.
          var map = new google.maps.Map(
              document.getElementById('map-canvas'), {
                  // The map is centered on Praia in Cape Verde. I like Cape Verde.
                  center: new google.maps.LatLng(14.914, -23.517),
                  zoom: 15,
                  mapTypeId: google.maps.MapTypeId.ROADMAP,
                  scaleControl: true,
              });

          // Center the map on the location received from the browser.
          function gotLocation(position) {
              var location = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
              // Move the map to this location.
              map.setCenter(location);
              // Put a marker on the click location so the user knows where they clicked.
              if (marker == null) {
                  // Create the marker the first time only.
                  marker = new google.maps.Marker({
                      map: map
                  });
                  outline = new google.maps.Polyline({
                      map: map,
                      strokeWeight: 1.0,
                  });
              }
              // Get the OLC code and display it.
              var fullCode = OpenLocationCode.encode(location.lat(), location.lng());
              // Now we have the full code, let's get the short version by dropping the first four characters.
              // Build the message for the display. We are not even going to display the full code - because it's
              // too long to be useful or memorable. It's much better to display the short code, and the city or 
              // town name (if known)
              document.getElementById('latitude').value = location.lat();
              document.getElementById('longitude').value = location.lng();
              var codeLocation = OpenLocationCode.decode(fullCode);
              marker.setPosition(new google.maps.LatLng(codeLocation.latitudeCenter, codeLocation.longitudeCenter));
              marker.setTitle("Your Position");
              // Draw the outline of the OLC area for the click.
              var path = [
                  { lat: codeLocation.latitudeLo, lng: codeLocation.longitudeLo },
                  { lat: codeLocation.latitudeHi, lng: codeLocation.longitudeLo },
                  { lat: codeLocation.latitudeHi, lng: codeLocation.longitudeHi },
                  { lat: codeLocation.latitudeLo, lng: codeLocation.longitudeHi },
                  { lat: codeLocation.latitudeLo, lng: codeLocation.longitudeLo }
              ];
              outline.setPath(path);
          }

          // Here's where we ask the browser for the current position. Once it has it, it will call
          // the gotLocation function.
          navigator.geolocation.getCurrentPosition(gotLocation);
          map.addListener('click', mapClick);

          // Display the Open Location Code for a map click event.
          function mapClick(event) {
              var fullCode = OpenLocationCode.encode(event.latLng.lat(), event.latLng.lng());
              // Now we have the full code, let's get the short version by dropping the first four characters.
              var shortCode = fullCode.substr(4);
              // Build the message for the display. We are not even going to display the full code - because it's
              // too long to be useful or memorable. It's much better to display the short code, and the city or 
              // town name (if known).
              document.getElementById('latitude').value = location.lat();
              document.getElementById('longitude').value = location.lng();

              // Finally, put a marker on the click location so the user knows where they clicked.
              if (marker == null) {
                  // Create the marker the first time only.
                  marker = new google.maps.Marker({
                      map: map
                  });
                  outline = new google.maps.Polyline({
                      map: map,
                      strokeWeight: 1.0,
                  });
              }
              var codeLocation = OpenLocationCode.decode(fullCode);
              marker.setPosition(new google.maps.LatLng(codeLocation.latitudeCenter, codeLocation.longitudeCenter));
              marker.setTitle(shortCode);
              // Draw the outline of the OLC area for the click.
              var path = [
                  { lat: codeLocation.latitudeLo, lng: codeLocation.longitudeLo },
                  { lat: codeLocation.latitudeHi, lng: codeLocation.longitudeLo },
                  { lat: codeLocation.latitudeHi, lng: codeLocation.longitudeHi },
                  { lat: codeLocation.latitudeLo, lng: codeLocation.longitudeHi },
                  { lat: codeLocation.latitudeLo, lng: codeLocation.longitudeLo }
              ];
              outline.setPath(path);
          }
      }

  </script>
<div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>EvaQ8</h2>
        <p class="lead">Are you stuck in a disaster? fill this form to ask for assistance.</p>
      </div>
        <div class="col-md-8 order-md-1">
          <form class="needs-validation" action="/api/create_help" method="post" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" name="fname"required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" name="lname" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="phone_number">Contact No.</label>
              <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="We can reach you for assistance">
              <div class="invalid-feedback">
                Please enter a valid contact no. for updates.
              </div>
            </div>
            <!-- Container for the map -->
            <div id="map-canvas" class="form-control col-md-8 mb-3" style="height: 500px; width: 500px;"></div>
            <input type="hidden" id="latitude" name="latitude" value="" required>
            <input type="hidden" id="longitude" name="longitude" value="" required>
            <hr class="mb-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="safe">
              <label class="custom-control-label" for="safe">Are you safe? or do you require urgent help?</label>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 EvaQ8</p>
      </footer>
@endsection