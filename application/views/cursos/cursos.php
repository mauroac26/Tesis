<?php
if($cursos){


foreach ($cursos->result() as $curso) {?>
    <ul>
       <li>
    <a href="<?php echo $curso->id;?>"><?php echo $curso->nombre;?></a>
       </li>
    </ul>
  <?php }
}else{
echo "<p>Error</p>";
}
   
   ?>

</body>
</html>