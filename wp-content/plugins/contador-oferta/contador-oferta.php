<?php
/*
Plugin Name: Contador de Ofertas
Description: Muestra un temporizador de cuenta regresiva para las ofertas. Usa el shortcode [contador_ofertas fecha_fin="YYYY-MM-DD HH:MM:SS"] para mostrar el temporizador en tus páginas o publicaciones
Version: 1.0
Author: Solís Martos Alejandro Stéfano
*/

if (! defined('ABSPATH')) {
    exit;
}

function contador_ofertas_shortcode($atts)
{
    $atts = shortcode_atts(
        array(
            'fecha_fin' => '2024-12-31 23:59:59',
        ),
        $atts
    );

    $fecha_fin = strtotime($atts['fecha_fin']);

    $tiempo_actual = time();
    $tiempo_restante = $fecha_fin - $tiempo_actual;

    if ($tiempo_restante > 0) {

        $dias = floor($tiempo_restante / (60 * 60 * 24));
        $horas = floor(($tiempo_restante % (60 * 60 * 24)) / (60 * 60));
        $minutos = floor(($tiempo_restante % (60 * 60)) / 60);
        $segundos = $tiempo_restante % 60;

        ob_start();
?>
        <style>
            #ofertas-contador {
                font-family: Arial, sans-serif;
                background-color: #f5f5f5;
                padding: 20px;
                border: 2px solid #ccc;
                border-radius: 10px;
                text-align: center;
                max-width: 300px;
                margin: 0 auto;
                margin-bottom: 20px;
            }

            #temporizador {
                font-size: 2rem;
                color: #ff6600;
                font-weight: bold;
                transition: color 0.5s;
            }

            .contador-label {
                font-size: 1rem;
                color: #333;
            }
        </style>
        <div id="ofertas-contador">
            <p class="contador-label">La oferta termina en:</p>
            <span id="temporizador"><?php echo "$dias días $horas:$minutos:$segundos"; ?></span>
        </div>
        <script>
            function agregarCero(num) {
                return (num < 10 ? '0' : '') + num;
            }

            function iniciarCuentaRegresiva(duracion) {
                var tiempo = duracion,
                    dias, horas, minutos, segundos;

                setInterval(function() {
                    dias = Math.floor(tiempo / (60 * 60 * 24));
                    horas = Math.floor((tiempo % (60 * 60 * 24)) / (60 * 60));
                    minutos = Math.floor((tiempo % (60 * 60)) / 60);
                    segundos = tiempo % 60;


                    document.getElementById('temporizador').textContent = dias + " días " + agregarCero(horas) + ":" + agregarCero(minutos) + ":" + agregarCero(segundos);


                    if (tiempo <= 86400) {
                        document.getElementById('temporizador').style.color = 'red';
                    }

                    if (--tiempo < 0) {
                        document.getElementById('temporizador').textContent = "¡Oferta terminada!";
                    }
                }, 1000);
            }

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
