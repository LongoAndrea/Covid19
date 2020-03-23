<head>
    <meta charset="utf-8">
    <title>Andamento Regioni</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/morris.css'?>">
  </head>
  <body>
  <div class="siimple-paragraph siimple--text-center bg-example siimple--bg-light siimple-paragraph siimple--text-bold">
    <h2 class="siimple-h2">Andamento Regioni</h2>
</div>
    <div id="graph"></div>
 
    <script src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/raphael-min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/morris.min.js'?>"></script>
    <script>
        Morris.Line({
          element: 'graph',
          data: <?php echo $data;?>,
          xkey: 'data',
          ykeys: ['terapia_intensiva','totale_casi','deceduti','dimessi_guariti','totale_attualmente_positivi'],
          labels: ['terapia_intensiva','totale_casi','deceduti','dimessi_guariti','totale_attualmente_positivi']
        });
    </script>
  </body>
</html>