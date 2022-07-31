<?php 

include 'room.class.php';
$cuartos = array(
    array(0,0,0,1,0,1,1,1),
    array(0,1,0,0,0,0,0,0),
    array(0,1,0,0,0,1,1,1),
    array(0,1,1,1,1,0,0,0),
    array(0,1,0,0,1,0,0,0),
    array(0,1,0,0,1,0,1,0),
    array(0,1,0,1,1,0,1,0),
    array(0,0,0,0,1,0,0,0),
    array(0,1,1,0,1,1,0,1),
    array(0,0,0,0,1,0,0,0),
    array(1,0,0,1,0,0,1,1),
    array(0,0,1,0,0,0,0,0)
);

if ($_POST) {
    $room = new Room;
    $newRoom = $room->addLight($_POST['room']);
}

?>

<!DOCTYPE html>
<html>
   <head>
      <title>Iluminacion de cuarto con los focos</title>
      <link href="assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/css/default.css" rel="stylesheet">
   </head>
   <body>
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <header>
                        <h1>Iluminacion de los cuartos</h1>
                    </header>
                    <main>
                        <h2>Agregar paredes con 1 y libres con 0</h2>
                        <form method="post">

                            <table class="table">
                                <?php foreach($cuartos as $i => $cuarto) { ?>
                                    <tr>
                                    <?php foreach($cuarto as $j => $linea) { ?> 
                                        <td><input type="text" class="form-control" name="room[<?=$i;?>][<?=$j;?>]" value="<?=$linea;?>" /></td>
                                    <?php } ?>
                                    </tr>
                                <?php } ?>
                            </table>
                            <input type="submit" value="Agregar iluminación" />
                        </form>

                        <?php 
                            echo "<h2>Valores agregados</h2>";
                            if (isset($_POST['room']) && !empty($_POST['room'])) {
                                echo "<table class='table'>";
                                foreach($_POST['room'] as $dato) {
                                    echo "<tr>";
                                    foreach($dato as $linea) {
                                        echo "<td>" . $linea . "</td>";
                                    }
                                    echo "</tr>";
                                }
                                echo "</table>";
                            }

                            echo "<h2>Cuarto iluminado</h2>";
                            if (isset($newRoom) && !empty($newRoom)) {
                                echo "<table class='table'>";
                                foreach($newRoom as $dato) {
                                    echo "<tr>";
                                    foreach($dato as $linea) {
                                        $linea  = ($linea == 'F') ? '<img src="assets/img/foco.png" width="25" />' : $linea;
                                        $class = ($linea == 'L') ? 'class="on"' : "";
                                        $linea = ($linea == 'L') ? '' : $linea;
                                        echo "<td ".$class.">" . $linea . "</td>";
                                    }
                                    echo "</tr>";
                                }
                                echo "</table>";
                            }

                        ?>


                    </main>
                </div>
            </div>
        </div>
   </body>
</html>
