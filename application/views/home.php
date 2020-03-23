<head>
  <link rel="stylesheet" href="<?php echo base_url().'assets/css/morris.css'?>">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
    integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
    crossorigin=""></script>
  <style>
    #mapid {
      height: 600px;
      width: 600px
    }
    #graph {
      margin-left: 16.2%;
      position: absolute;
      margin-top: 4%;
      right: 10%;
    }
  </style>
</head>

<body onload="loadData()">

<div class="siimple-paragraph siimple--text-center bg-example siimple--bg-light siimple-paragraph siimple--text-bold">
  <h1 class="siimple-h1">Home page Covid-19</h1>
  </div>


  <div id="graph" style="height: 500px;" class="siimple--ml-auto"></div>

  <script src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
  <script src="<?php echo base_url().'assets/js/raphael-min.js'?>"></script>
  <script src="<?php echo base_url().'assets/js/morris.min.js'?>"></script>
  <script>
    Morris.Donut({
      element: 'graph',
      resize: true,
      data: [
        { label: 'Dimessi guariti', value: <?php echo $data->dimessi_guariti ?> },
      { label: "Deceduti", value: <?php echo $data->deceduti ?>},
      { label: "Totale casi", value: <?php echo $data->totale_casi ?>}
          ]         
        });
  </script>