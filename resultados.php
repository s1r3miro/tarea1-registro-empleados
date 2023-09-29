
<?php
//Emiro Camacho/C.I:30.642.010

include_once('resultados.php');

// Variables
$total_femenino = 0;
$total_hombres_casados_mas2500 = 0;
$total_mujeres_viudas_mas1000 = 0;
$edad_hombres = 0;
$num_hombres = 0;
$promedio_edad_hombres = 0;

// Procesar datos de los empleados
for ($i = 1; $i <= 5; $i++) {

    $nombre_apellido = $_POST['nombre_apellido_' . $i];
    $edad = $_POST['edad_' . $i];
    $estado_civil = $_POST['estado_civil_' . $i];
    $sexo = $_POST['sexo_' . $i];
    $sueldo = $_POST['sueldo_' . $i];

    // Verificar que se cumplen con las condiciones

    //Empleados del sexo femenino
    if ($sexo == 'femenino') {
        $total_femenino++;
    }
    
    // else{
        //$total_femenino = 0;
    //     echo "Total de empleados del sexo femenino: " . "No se registraron mujeres" . "<br>";
    // }

    //Hombres casados que ganan mas de 2500 Bs
    if ($sexo == 'masculino' && $estado_civil == 'casado' && $sueldo == '+2500') {
        $total_hombres_casados_mas2500++;
    }

    //Mujeres viudas que ganan mas de 1000 Bs  
    if ($sexo == 'femenino' && $estado_civil == 'viudo' && $sueldo == '1000-2500') {
        $total_mujeres_viudas_mas1000++;
    }

    //Promedio de edad en hombres
    
    if ($sexo == 'masculino') {
        $edad_hombres += $edad;
        $num_hombres++;
        if ($num_hombres > 0) {
            
            $promedio_edad_hombres = $edad_hombres / $num_hombres;
        }
        
     }

}

// Mostrar resultados

echo "<br>" . "<br>" . "<br>" .  "<div  style='text-align: center; font-size: larger;'>" . "<b>" . "RESULTADOS" . "</b>" . "</div>" . "<br>";
echo "<br>" . "<br>" . "<br>" .  "<div  style='text-align: center; font-size: large;'>" . "Total de empleados del sexo femenino: " . "<b>" . $total_femenino . "</b>" . "</div>" . "<br>";
echo "<div  style='text-align: center; font-size: large;'>" . "Total de hombres casados que ganan más de 2500 Bs.: " . "<b>" . $total_hombres_casados_mas2500 . "</b>" . "</div>" . "<br>";
echo "<div  style='text-align: center; font-size: large;'>" . "Total de mujeres viudas que ganan más de 1000 Bs.: " . "<b>" .$total_mujeres_viudas_mas1000 . "</b>" . "</div>" . "<br>";
echo "<div  style='text-align: center; font-size: large;'>" . "Edad promedio de los hombres: " . "<b>" . $promedio_edad_hombres . "</b>" . "</div>" . "<br>";

?>