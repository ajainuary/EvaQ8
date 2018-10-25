
<!DOCTYPE html>
<html>
  <head>
    <title>EvaQ8R</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.10/semantic.min.css" >

    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #origin-input,
      #destination-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 200px;
      }

      #origin-input:focus,
      #destination-input:focus {
        border-color: #4d90fe;
      }

      #mode-selector {
        color: #fff;
        background-color: #4d90fe;
        margin-left: 12px;
        padding: 5px 11px 0px 11px;
      }

      #mode-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }
      li{
      	font-family: georgia;
      }

    </style>
  </head>
  <body>
  	<div class= "ui main container segment">
  		<h1 style="font-size: 75px; font-family: georgia">EvaQ8R</h1>
  		<h2 style="text-align: right; font-family: georgia">Safe route planner</h2>
  	</div>
    <input id="origin-input" class="controls" type="text"
        placeholder="Enter an origin location">

    <input id="destination-input" class="controls" type="text"
        placeholder="Enter a destination location">

    <div id="mode-selector" class="controls">
      <input type="radio" name="type" id="changemode-walking" checked="checked">
      <label for="changemode-walking">Walking</label>

      <input type="radio" name="type" id="changemode-driving">
      <label for="changemode-driving">Driving</label>
    </div>

    <div id="map" class="ui container"></div>
   <div class = "ui container">
   	<h2>Move along the path with the least danger index to evaq8 safely!</h2>
   </div>
    
       <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUjKlnObDJwUO6f2ueMvzc3UyF_Jepd5U&libraries=places"
        ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
   
    <script>
   
      var  data=  [
  {'lati': 77.249200000000002, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.536300000000001}, {'lati': 77.085999999999999, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.6127}, {'lati': 77.2042, 'type': 'Feature', 'properties': {'mag': 4}, 'longi': 28.529900000000001}, {'lati': 77.236099999999993, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.643599999999999}, {'lati': 77.193700000000007, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.7026}, {'lati': 77.293700000000001, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.653400000000001}, {'lati': 77.226200000000006, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.666399999999999}, {'lati': 77.265299999999996, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.5307}, {'lati': 77.066199999999995, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.609100000000002}, {'lati': 77.267600000000002, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.5623}, {'lati': 77.306200000000004, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.523}, {'lati': 77.224199999999996, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.7072}, {'lati': 77.003600000000006, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.7258}, {'lati': 77.1738, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.66}, {'lati': 77.086399999999998, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.5914}, {'lati': 77.127600000000001, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.7179}, {'lati': 77.179000000000002, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.570499999999999}, {'lati': 77.115899999999996, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.702400000000001}, {'lati': 77.132800000000003, 'type': 'Feature', 'properties': {'mag': 4}, 'longi': 28.674399999999999}, {'lati': 77.015600000000006, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.6037}, {'lati': 77.197400000000002, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.736599999999999}, {'lati': 77.233599999999996, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.652799999999999}, {'lati': 77.175299999999993, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.709800000000001}, {'lati': 77.196100000000001, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.603400000000001}, {'lati': 77.302599999999998, 'type': 'Feature', 'properties': {'mag': 3}, 'longi': 28.6204}, {'lati': 77.088800000000006, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.679600000000001}, {'lati': 77.1511, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.465499999999999}, {'lati': 77.217500000000001, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.649799999999999}, {'lati': 77.119900000000001, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.639700000000001}, {'lati': 77.174899999999994, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.733599999999999}, {'lati': 77.226200000000006, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.643000000000001}, {'lati': 77.224999999999994, 'type': 'Feature', 'properties': {'mag': 4}, 'longi': 28.6309}, {'lati': 77.204899999999995, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.569299999999998}, {'lati': 77.208600000000004, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.700199999999999}, {'lati': 77.292199999999994, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.668800000000001}, {'lati': 77.257400000000004, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.533200000000001}, {'lati': 77.256399999999999, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.5473}, {'lati': 77.180499999999995, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.6478}, {'lati': 77.240499999999997, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.587399999999999}, {'lati': 77.144999999999996, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.630800000000001}, {'lati': 77.274600000000007, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.526800000000001}, {'lati': 77.142200000000003, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.725200000000001}, {'lati': 76.915599999999998, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.595700000000001}, {'lati': 77.120800000000003, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.6266}, {'lati': 77.0608, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.709599999999998}, {'lati': 77.101900000000001, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.710000000000001}, {'lati': 77.240899999999996, 'type': 'Feature', 'properties': {'mag': 4}, 'longi': 28.559100000000001}, {'lati': 77.139099999999999, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.798999999999999}, {'lati': 77.164199999999994, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.7258}, {'lati': 77.1524, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.5349}, {'lati': 77.165700000000001, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.742899999999999}, {'lati': 77.042500000000004, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.796500000000002}, {'lati': 77.0518, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.724499999999999}, {'lati': 77.137799999999999, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.633600000000001}, {'lati': 77.214299999999994, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.498899999999999}, {'lati': 77.1828, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.635000000000002}, {'lati': 77.1571, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.716799999999999}, {'lati': 77.159800000000004, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.684200000000001}, {'lati': 77.119299999999996, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.697800000000001}, {'lati': 77.208500000000001, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.665400000000002}, {'lati': 77.214299999999994, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.629999999999999}, {'lati': 77.244200000000006, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.592400000000001}, {'lati': 77.240600000000001, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.6419}, {'lati': 77.0916, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.6966}, {'lati': 77.306600000000003, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.666799999999999}, {'lati': 77.218800000000002, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.6556}, {'lati': 77.078599999999994, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.7026}, {'lati': 77.276399999999995, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.6554}, {'lati': 77.221500000000006, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.688500000000001}, {'lati': 77.174300000000002, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.692399999999999}, {'lati': 77.101399999999998, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.638999999999999}, {'lati': 77.082899999999995, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.588100000000001}, {'lati': 77.146600000000007, 'type': 'Feature', 'properties': {'mag': 4}, 'longi': 28.6601}, {'lati': 77.099500000000006, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.609400000000001}, {'lati': 77.209299999999999, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.645800000000001}, {'lati': 77.211200000000005, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.654}, {'lati': 77.199100000000001, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.5745}, {'lati': 76.982699999999994, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.6098}, {'lati': 77.087199999999996, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.529599999999999}, {'lati': 77.317099999999996, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.613600000000002}, {'lati': 77.303600000000003, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.4938}, {'lati': 77.144099999999995, 'type': 'Feature', 'properties': {'mag': 4}, 'longi': 28.689}, {'lati': 77.207700000000003, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.6692}, {'lati': 77.206500000000005, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.692499999999999}, {'lati': 77.203199999999995, 'type': 'Feature', 'properties': {'mag': 3}, 'longi': 28.6386}, {'lati': 77.211200000000005, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.598299999999998}, {'lati': 77.240499999999997, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.5684}, {'lati': 77.280699999999996, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.667000000000002}, {'lati': 77.233699999999999, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.604199999999999}, {'lati': 77.313100000000006, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.655999999999999}, {'lati': 77.156199999999998, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.758400000000002}, {'lati': 77.232799999999997, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.554099999999998}, {'lati': 77.068299999999994, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.629999999999999}, {'lati': 77.064899999999994, 'type': 'Feature', 'properties': {'mag': 4}, 'longi': 28.625}, {'lati': 77.233400000000003, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.564699999999998}, {'lati': 77.292400000000001, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.562100000000001}, {'lati': 77.231499999999997, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.662500000000001}, {'lati': 77.290999999999997, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.5016}, {'lati': 77.281999999999996, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.540500000000002}, {'lati': 77.066999999999993, 'type': 'Feature', 'properties': {'mag': 3}, 'longi': 28.681999999999999}, {'lati': 77.198599999999999, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.558499999999999}, {'lati': 77.225499999999997, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.6434}, {'lati': 77.066699999999997, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.578399999999998}, {'lati': 77.101200000000006, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.671099999999999}, {'lati': 77.067400000000006, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.6205}, {'lati': 77.235399999999998, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.618200000000002}, {'lati': 77.119600000000005, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.651499999999999}, {'lati': 77.242999999999995, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.509599999999999}, {'lati': 77.303700000000006, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.607299999999999}, {'lati': 77.078900000000004, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.747699999999998}, {'lati': 77.267300000000006, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.659600000000001}, {'lati': 77.058499999999995, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.5641}, {'lati': 77.158699999999996, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.647500000000001}, {'lati': 77.036000000000001, 'type': 'Feature', 'properties': {'mag': 3}, 'longi': 28.6538}, {'lati': 77.227199999999996, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.5288}, {'lati': 77.270300000000006, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.637799999999999}, {'lati': 77.295299999999997, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.638500000000001}, {'lati': 77.135099999999994, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.640499999999999}, {'lati': 77.208500000000001, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.549399999999999}, {'lati': 77.022800000000004, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.8066}, {'lati': 77.120999999999995, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.730399999999999}, {'lati': 77.247200000000007, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.627400000000002}, {'lati': 77.225099999999998, 'type': 'Feature', 'properties': {'mag': 3}, 'longi': 28.575900000000001}, {'lati': 77.124399999999994, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.598700000000001}, {'lati': 77.193299999999994, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.6526}, {'lati': 77.113299999999995, 'type': 'Feature', 'properties': {'mag': 3}, 'longi': 28.657599999999999}, {'lati': 77.283900000000003, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.643599999999999}, {'lati': 77.158199999999994, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.6524}, {'lati': 77.169300000000007, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.558}, {'lati': 77.193200000000004, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.6526}, {'lati': 77.260199999999998, 'type': 'Feature', 'properties': {'mag': 4}, 'longi': 28.578399999999998}, {'lati': 77.088499999999996, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.853200000000001}, {'lati': 77.311800000000005, 'type': 'Feature', 'properties': {'mag': 4}, 'longi': 28.598199999999999}, {'lati': 77.213700000000003, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.624700000000001}, {'lati': 77.071700000000007, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.664999999999999}, {'lati': 77.306100000000001, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.625399999999999}, {'lati': 77.1785, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.680599999999998}, {'lati': 77.306100000000001, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.625399999999999}, {'lati': 76.966800000000006, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.628699999999998}, {'lati': 76.994699999999995, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.5869}, {'lati': 77.180199999999999, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.5215}, {'lati': 77.146000000000001, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.700399999999998}, {'lati': 77.081900000000005, 'type': 'Feature', 'properties': {'mag': 3}, 'longi': 28.628599999999999}, {'lati': 77.183700000000002, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.668399999999998}, {'lati': 77.192599999999999, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.670000000000002}, {'lati': 77.202600000000004, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.684999999999999}, {'lati': 77.152299999999997, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.5349}, {'lati': 77.118200000000002, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.7089}, {'lati': 77.332700000000003, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.6249}, {'lati': 77.316500000000005, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.678100000000001}, {'lati': 77.268600000000006, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.674299999999999}, {'lati': 77.298599999999993, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.6828}, {'lati': 77.285200000000003, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.674199999999999}, {'lati': 77.256100000000004, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.711099999999998}, {'lati': 77.291700000000006, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.696100000000001}, {'lati': 77.3185, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.706}, {'lati': 76.960800000000006, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.670400000000001}, {'lati': 77.264399999999995, 'type': 'Feature', 'properties': {'mag': 3}, 'longi': 28.7013}, {'lati': 77.272999999999996, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.679099999999998}, {'lati': 77.274799999999999, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.673400000000001}, {'lati': 77.308199999999999, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.698499999999999}, {'lati': 77.316000000000003, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.684999999999999}, {'lati': 77.262100000000004, 'type': 'Feature', 'properties': {'mag': 0}, 'longi': 28.672000000000001}, {'lati': 77.256100000000004, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.711300000000001}, {'lati': 77.274500000000003, 'type': 'Feature', 'properties': {'mag': 2}, 'longi': 28.732800000000001}, {'lati': 77.280799999999999, 'type': 'Feature', 'properties': {'mag': 1}, 'longi': 28.702200000000001}
];
        var map;
        var directionsDisplay;
          var directionsService;

      function initMap(location) {
         directionsService = new google.maps.DirectionsService();
          directionsDisplay = new google.maps.DirectionsRenderer();
          var loc = new google.maps.LatLng(location.coords.latitude,location.coords.longitude);
        map = new google.maps.Map(document.getElementById('map'), {
          mapTypeControl: false,
          zoom: 7,
          center: loc,
          mapTypeId: 'terrain'
        });
        var marker = new google.maps.Marker({
          position: loc,
          map: map
        }); 

        // directionsDisplay.setMap(map);
         directionsDisplay.setMap(map);
         var script = document.createElement('script');
        //script.src = 'helper.js';
         document.getElementsByTagName('head')[0].appendChild(script);

          map.data.setStyle(function(feature) {
          var magnitude = feature.getProperty('mag');
          console.log(typeof(magnitude));
          return {
            icon: getCircle(magnitude)
          };
        });
        new AutocompleteDirectionsHandler(map);
      }
      function getCircle(magnitude) {
        return {
          path: google.maps.SymbolPath.CIRCLE,
          fillColor: 'red',
          fillOpacity: .2,
          scale: Math.pow(2, magnitude) / 2,
          strokeColor: 'white',
          strokeWeight: .5
        };
      }

       /**
        * @constructor
       */
      function AutocompleteDirectionsHandler(map) {
        this.map = map;
        this.originPlaceId = null;
        this.destinationPlaceId = null;
        this.travelMode = 'WALKING';
        var originInput = document.getElementById('origin-input');
        var destinationInput = document.getElementById('destination-input');
        var modeSelector = document.getElementById('mode-selector');
        this.directionsService = new google.maps.DirectionsService;
        this.directionsDisplay = new google.maps.DirectionsRenderer;
        this.directionsDisplay.setMap(map);

        var originAutocomplete = new google.maps.places.Autocomplete(
            originInput, {placeIdOnly: true});
        var destinationAutocomplete = new google.maps.places.Autocomplete(
            destinationInput, {placeIdOnly: true});
        this.setupClickListener('changemode-driving', 'DRIVING');
        this.setupClickListener('changemode-walking', 'WALKING');
        // this.setupClickListener('changemode-transit', 'TRANSIT');
        //this.setupClickListener('changemode-driving', 'DRIVING');

        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
      }

      // Sets a listener on a radio button to change the filter type on Places
      // Autocomplete.
      AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
        var radioButton = document.getElementById(id);
        var me = this;
        radioButton.addEventListener('click', function() {
          me.travelMode = mode;
          me.route();
        });
      };

      AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
        var me = this;
        autocomplete.bindTo('bounds', this.map);
        autocomplete.addListener('place_changed', function() {
          var place = autocomplete.getPlace();
          if (!place.place_id) {
            window.alert("Please select an option from the dropdown list.");
            return;
          }
          if (mode === 'ORIG') {
            me.originPlaceId = place.place_id;
          } else {
            me.destinationPlaceId = place.place_id;
          }
          me.route();
        });

      };

      AutocompleteDirectionsHandler.prototype.route = function() {
        if (!this.originPlaceId || !this.destinationPlaceId) {
          return;
        }
        var me = this;

        this.directionsService.route({
          origin: {'placeId': this.originPlaceId},
          destination: {'placeId': this.destinationPlaceId},
          travelMode: this.travelMode,
          provideRouteAlternatives: true,
          unitSystem: google.maps.UnitSystem.METRIC
        }, function(response, status) {
          if (status === 'OK') {
            var image1 = {
          url: 'http://127.0.0.1:8000/cross.png',
          // This marker is 20 pixels wide by 32 pixels high.
           scaledSize: new google.maps.Size(28, 28),
         // size: new google.maps.Size(20, 32),
    
        };
          var image2 = {
          url: 'https://www.canada.ca/content/dam/hc-sc/migration/hc-sc/cps-spc/images/legislation/acts-lois/hazard-symbol-danger1.jpg',
          // This marker is 20 pixels wide by 32 pixels high.
           scaledSize: new google.maps.Size(28, 28),
         // size: new google.maps.Size(20, 32),
    
        };
        ;
          var image3 = {
          url: 'http://127.0.0.1:8000/warn.png',
          // This marker is 20 pixels wide by 32 pixels high.
           scaledSize: new google.maps.Size(23, 23),
         // size: new google.maps.Size(20, 32),
    
        };
        var image4 = {
          url: 'http://127.0.0.1:8000/smiley.png',
          // This marker is 20 pixels wide by 32 pixels high.
           scaledSize: new google.maps.Size(23, 23),
         // size: new google.maps.Size(20, 32),
    
        };
        var image5 = {
          url: 'http://127.0.0.1:8000/tick.png',
          // This marker is 20 pixels wide by 32 pixels high.
           scaledSize: new google.maps.Size(23, 23),
         // size: new google.maps.Size(20, 32),
    
        };
        color=["purple","yellow","green","blue","pink"];
            //me.directionsDisplay.setDirections(response);
           console.log(response.routes.length);
           var dindex=[];
             for (var k = 0, len = response.routes.length; k < len; k++) {
              dindex[k]=0;
              var points = response.routes[k].overview_path;
               new google.maps.DirectionsRenderer({
                    map: map,
                    directions: response,
                    routeIndex: k,
                     unitSystem: google.maps.UnitSystem.METRIC,
                    provideRouteAlternatives: true,
                      polylineOptions: {
                    strokeColor: color[k],
                    strokeOpacity: 1,
                    strokeWeight: 5

                }

                });
               //console.log(points);
               //console.log(data);
               var  infoWindow = new google.maps.InfoWindow;
               var posInit;
                        var count = 0;
             for (var j = 0; j < points.length; j++) {
                      for (var i = 0; i < data.length; i++) {
                   
                        var st1 = data[i].lati.toString();
                        st1=st1.slice(0,(st1.indexOf("."))+3);
                        var st3 = data[i].longi.toString();
                        st3=st3.slice(0,(st3.indexOf("."))+3);
                        var st2 = points[j].lng().toString();
                        st2=st2.slice(0,(st2.indexOf("."))+3);
                        var st4 = points[j].lat().toString();
                        st4=st4.slice(0,(st4.indexOf("."))+3);
                      
                         if ((st1 === st2) && (st3 === st4))
                          {
                            count++;
                              posInit = new google.maps.LatLng(data[i].longi,data[i].lati);
                           
                               if(data[i].properties.mag==4){
         var marker = new google.maps.Marker({
          position: new google.maps.LatLng(data[i].longi,data[i].lati),
          icon:image1,
          map: map
        });
dindex[k]+=4;
         }
         else if(data[i].properties.mag==3){
         var marker = new google.maps.Marker({
          position: new google.maps.LatLng(data[i].longi,data[i].lati),
          icon:image2,
          map: map
        }); dindex[k]+=3;}
       else if(data[i].properties.mag==2){
         var marker = new google.maps.Marker({
          position: new google.maps.LatLng(data[i].longi,data[i].lati),
          icon:image3,
          map: map
        }); dindex[k]+=2;}
        else if(data[i].properties.mag==1){
         var marker = new google.maps.Marker({
          position: new google.maps.LatLng(data[i].longi,data[i].lati),
          icon:image4,
          map: map
        }); dindex[k]+=1;}
        else if(data[i].properties.mag==0){
         var marker = new google.maps.Marker({
          position: new google.maps.LatLng(data[i].longi,data[i].lati),
          icon:image5,
          map: map
        }); }
                        
                  }
                  }

                }
              
 dindex[k]/=count;
 var div = document.createElement('div');
 div.className = "ui main container segment"
 document.body.appendChild(div);
 var colour = "color"+k,
 	 duration = "duration"+k,
 	 distance = "distance"+k,
 	 safetyi = "safetyi"+k;
 div.innerHTML = '<ul class="msg"><li id='+colour+'></li><li id='+duration+'></li><li id='+distance+'></li><li id='+safetyi+'></li></ul>';
  document.getElementById(colour).innerHTML = "Route Number:  " + k + " is colored " +
      (color[k]) ;
   document.getElementById(distance).innerHTML = "Distance  : " +
      (response.routes[k].legs[0].distance.text) ;
    //console.log((response.routes[i].legs[0].distance.value) / 1000 + "killo meters");
    // Display the duration:
    document.getElementById(duration).innerHTML = "Time duration for reaching : " +
      response.routes[k].legs[0].duration.text;
    console.log(response.routes[k].legs[0]);
  infoWindow.setPosition(posInit);
   var message = 'dangerIndex is :'+dindex[k];
  document.getElementById(safetyi).innerHTML = message;
  var dis='Route :'+k;
   //infoWindow.setContent(dis);
      //       infoWindow.open(map);
 
          
        }
          //  console.log(dindex);
var routes = response.routes;
                    for (var j = 0; j < routes.length; j++) {
                        var points = routes[j].overview_path;
                        
    
                    }
                    
         
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      };
  
      $(document).ready(function(){
        navigator.geolocation.getCurrentPosition(initMap);
      });
    </script>
    
  </body>
</html>
