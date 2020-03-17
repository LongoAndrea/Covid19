
<head>
   <link rel="stylesheet" href="<?php echo base_url().'assets/css/morris.css'?>">
</head>
  <body>
    <h1>Home page Covid-19 </h1>
    <div id="graph"></div>
 
    <script src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/raphael-min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/morris.min.js'?>"></script>
    <script>
        Morris.Donut({
          element: 'graph',
          data: [
            {label: 'Dimessi guariti', value: <?php echo $data->dimessi_guariti?> },
            {label: "Deceduti", value: <?php echo $data->deceduti?>},
            {label: "Totale casi", value: <?php echo $data->totale_casi?>}
          ]
         
        });
    </script>
   
  </body>
</html>