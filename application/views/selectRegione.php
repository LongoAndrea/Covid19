<head>
    <meta charset="utf-8">
    <title>Scegli Provincia</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/morris.css'?>">
  </head>
  <body>
    <h2>Scegli Regioni</h2>
    
    <?= form_open('Welcome/selectRegione') ?>
    <p>
    Regione:    
    <select name="regione">
    <?php foreach($dato as $p): ?>
    <option value="<?= $p->denominazione_regione ?>"><?= $p->denominazione_regione ?></option>
    <?php endforeach ?>
    </select>    
    <input type="submit">
    
 
  </body>
</html>