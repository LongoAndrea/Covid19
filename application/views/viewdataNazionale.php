
  <head>
    <meta charset="utf-8">
    <title>Andamento Nazionale</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/morris.css'?>">
  </head>
  <body>
  <div class="siimple-paragraph siimple--text-center bg-example siimple--bg-light siimple-paragraph siimple--text-bold">
    <h2 class="siimple-h2">Andamento Nazionale</h2>
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
          ykeys: ['totale_casi','deceduti'],
          labels: ['totale_casi','deceduti']
        });
    </script>
  </body>
</html>