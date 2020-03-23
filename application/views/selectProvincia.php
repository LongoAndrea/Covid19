<head>
    <meta charset="utf-8">
    <title>Scegli Provincia</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/morris.css'?>">
  </head>
  <body>
  <div class="siimple-paragraph siimple--text-center bg-example siimple--bg-light siimple-paragraph siimple--text-bold">
    <h2 class="siimple-h2">Scegli Provincia</h2>
</div>
    
<div class="siimple-form siimple--pl-5">
    <?= form_open('Welcome/selectProvince') ?>
    <p>
    <div class="siimple-form-title">Provincia:</div>
    
    <select name="provincia" class="siimple-select siimple--ml-auto ">
    <?php foreach($dato as $p): ?>
    <option value="<?= $p->denominazione_provincia ?>"><?= $p->denominazione_provincia ?></option>
    <?php endforeach ?>
    </select>
    <input type="submit" class="siimple-btn siimple-btn--navy">
    </div>
 
  </body>
</html>