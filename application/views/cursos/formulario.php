<?php echo form_open('/prueba/recibirdatos') ?>

<?php
$nombre = array(
    'name' => 'nombre',
     'placeholder' => 'Escribe tu nombre');

$edad = array(
    'name' => 'edad',
     'placeholder' => 'Escribe tu edad');
?>

<?php form_label('Nombre: ', 'nombre')?>

<?php echo form_input($nombre) ?>

<br><br>
<?php form_label('Edad: ', 'edad')?>


<?php echo form_input($edad) ?>

<?php echo form_submit('','Subir curso')?>
<?php echo form_close() ?>
</body>
</html>