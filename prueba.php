 <?php

 require_once("models/Votacionmapper.php");
 $vMapper = new Votacionmapper(); 

 //$operacionCorrecta = $vMapper->modificaVotacionProfesional(0, 3, 6, 8);
 	print_r($votoFinalista); // 1 para el caso de una votacion en la final del concurso
    print_r($nota);
    print_r($idPincho);
    print_r($idJurado);