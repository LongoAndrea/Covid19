<head>
    <meta charset="utf-8">
    <title>Andamento Regioni</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/morris.css'?>">
  </head>
  <body>
    <h2>Andamento Regioni</h2>
 
    <div id="graph"></div>
 
    <script src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/raphael-min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/morris.min.js'?>"></script>
    <script>
        Morris.Line({
          element: 'graph',
          data: <?php echo $data;?>,
          xkey: 'data',
          ykeys: ['terapia_intensiva','tamponi','totale_casi','deceduti','dimessi_guariti','totale_attualmente_positivi'],
          labels: ['terapia_intensiva','tamponi','totale_casi','deceduti','dimessi_guariti','totale_attualmente_positivi']
        });
    </script>
  </body>
</html>