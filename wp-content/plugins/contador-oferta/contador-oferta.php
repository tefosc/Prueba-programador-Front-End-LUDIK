<?php
/*
Plugin Name: Contador de Ofertas
Description: Muestra un temporizador de cuenta regresiva para las ofertas.
Version: 1.0
Author: Solís Martos Alejandro Stéfano
*/

// Evitar el acceso directo al archivo
if (! defined('ABSPATH')) {
    exit;
}

// Shortcode para mostrar el contador de ofertas
function contador_ofertas_shortcode($atts)
{
    // Atributos por defecto
    $atts = shortcode_atts(
        array(
            'fecha_fin' => '2024-12-31 23:59:59', // Tiempo final por defecto
        ),
        $atts
    );

    // Convertir el tiempo final en formato Unix Timestamp
    $fecha_fin = strtotime($atts['fecha_fin']);

    // Obtenemos la diferencia de tiempo
    $tiempo_actual = time();
    $tiempo_restante = $fecha_fin - $tiempo_actual;

    if ($tiempo_restante > 0) {
        // Convertir segundos en formato días, horas, minutos y segundos
        $dias = floor($tiempo_restante / (60 * 60 * 24));
        $horas = floor(($tiempo_restante % (60 * 60 * 24)) / (60 * 60));
        $minutos = floor(($tiempo_restante % (60 * 60)) / 60);
        $segundos = $tiempo_restante % 60;

        // Mostrar el temporizador en pantalla
        ob_start();
?>
        <div id="ofertas-contador">
            <p>La oferta termina en: <span id="temporizador"><?php echo "$dias días $horas:$minutos:$segundos"; ?></span></p>
        </div>
        <script>
            // Función para agregar ceros a la izquierda
            function agregarCero(num) {
                return (num < 10 ? '0' : '') + num;
            }

            // JavaScript para actualizar el contador en tiempo real
            function iniciarCuentaRegresiva(duracion) {
                var tiempo = duracion,
                    dias, horas, minutos, segundos;
                setInterval(function() {
                    dias = Math.floor(tiempo / (60 * 60 * 24));
                    horas = Math.floor((tiempo % (60 * 60 * 24)) / (60 * 60));
                    minutos = Math.floor((tiempo % (60 * 60)) / 60);
                    segundos = tiempo % 60;

                    document.getElementById('temporizador').textContent = dias + " días " + agregarCero(horas) + ":" + agregarCero(minutos) + ":" + agregarCero(segundos);

                    if (--tiempo < 0) {
                        document.getElementById('temporizador').textContent = "¡Oferta terminada!";
                    }
                }, 1000);
            }

            // Iniciar el contador
            var duracionCuentaRegresiva = <?php echo $tiempo_restante; ?>;
            iniciarCuentaRegresiva(duracionCuentaRegresiva);
        </script>
<?php
        return ob_get_clean();
    } else {
        return '<p>¡La oferta ha terminado!</p>';
    }
}
add_shortcode('contador_ofertas', 'contador_ofertas_shortcode');
