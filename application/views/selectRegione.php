<head>
    <meta charset="utf-8">
    <title>Scegli Provincia</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/morris.css'?>">
  </head>
  <body>
  <div class="siimple-paragraph siimple--text-center bg-example siimple--bg-light siimple-paragraph siimple--text-bold">
    <h2 class="siimple-h2">Scegli Regioni</h2>
</div>
    
<div class="siimple-form siimple--pl-5">    
    <?= form_open('Welcome/selectRegione') ?>
    <p>
    <div class="siimple-form-title">Regione:</div>    
    <select name="regione" class="siimple-select siimple--ml-auto ">
    <?php foreach($dato as $p): ?>
    <option value="<?= $p->denominazione_regione ?>"><?= $p->denominazione_regione ?></option>
    <?php endforeach ?>
    </select>    
    <input type="submit" class="siimple-btn siimple-btn--navy">
    </div>   
 
  </body>
</html>