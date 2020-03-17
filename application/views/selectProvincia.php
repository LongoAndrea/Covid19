<head>
    <meta charset="utf-8">
    <title>Scegli Provincia</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/morris.css'?>">
  </head>
  <body>
    <h2>Scegli Provincia</h2>

    <?= form_open('Welcome/selectProvince') ?>
    <p>
    Provincia:
    <select name="provincia">
    <?php foreach($dato as $p): ?>
    <option value="<?= $p->denominazione_provincia ?>"><?= $p->denominazione_provincia ?></option>
    <?php endforeach ?>
    </select>
    <input type="submit">

 
  </body>
</html>