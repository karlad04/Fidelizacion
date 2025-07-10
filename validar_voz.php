<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificación por Voz Mejorada</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            text-align: center;
            margin-top: 100px;
        }

        h2 {
            color: #333;
        }

        button {
            background-color: #007BFF;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            margin: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }

        #estado {
            margin-top: 20px;
            font-weight: bold;
            min-height: 60px;
        }

        .correcto {
            color: #28a745;
        }

        .error {
            color: #dc3545;
        }

        .advertencia {
            color: #ffc107;
        }

        #debug {
            margin-top: 20px;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 5px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
            text-align: left;
            font-family: monospace;
        }
    </style>
</head>
<body>
    <h2>Verificación por voz</h2>
    <p>Di en voz alta: <strong>"la clave secreta para ingresar"</strong></p>

    <button onclick="iniciarReconocimiento()">Iniciar Micrófono</button>
    <button onclick="reiniciar()">Reintentar</button>
    
    <div id="estado">Presiona "Iniciar Micrófono" y habla claramente</div>
    <div id="debug"></div>

    <script>
        function logDebug(message) {
            const debugDiv = document.getElementById('debug');
            debugDiv.innerHTML += `<div>${new Date().toLocaleTimeString()}: ${message}</div>`;
        }

        function reiniciar() {
            document.getElementById('estado').innerHTML = 'Presiona "Iniciar Micrófono" y habla claramente';
            document.getElementById('estado').className = '';
            document.getElementById('debug').innerHTML = '';
        }

        function iniciarReconocimiento() {
            const estado = document.getElementById('estado');
            estado.className = '';
            estado.innerHTML = '🎙️ Preparando micrófono...';
            
            logDebug('Iniciando verificación de voz');

            // Verificamos compatibilidad
            const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

            if (!SpeechRecognition) {
                estado.innerHTML = '❌ Tu navegador no soporta reconocimiento de voz. Usa Chrome o Edge.';
                estado.className = 'error';
                logDebug('API de reconocimiento de voz no soportada');
                return;
            }

            const reconocimiento = new SpeechRecognition();
            reconocimiento.lang = 'es-ES';
            reconocimiento.interimResults = false;
            reconocimiento.maxAlternatives = 3; // Aumentamos alternativas para mejor reconocimiento

            estado.innerHTML = '🎤 Di ahora: <strong>"ingresame al sistema"</strong>';
            logDebug('Reconocimiento configurado. Esperando voz...');

            reconocimiento.start();

            reconocimiento.onresult = function(event) {
                const texto = event.results[0][0].transcript.toLowerCase()
                    .normalize("NFD").replace(/[\u0300-\u036f]/g, ""); // Elimina acentos
                
                logDebug(`Texto reconocido: "${texto}"`);
                
                // Palabras clave flexibles
                const palabrasRequeridas = ["ingresame", "ingresa", "ingresar"];
                const palabrasSecundarias = ["sistema", "sistemas"];
                
                const tienePalabraPrincipal = palabrasRequeridas.some(palabra => 
                    texto.includes(palabra));
                const tienePalabraSecundaria = palabrasSecundarias.some(palabra => 
                    texto.includes(palabra));

                if (tienePalabraPrincipal && tienePalabraSecundaria) {
                    estado.innerHTML = '✅ Voz verificada correctamente. Redirigiendo...';
                    estado.className = 'correcto';
                    logDebug('Frase aceptada. Redirigiendo...');
                    
                    setTimeout(() => {
                        window.location.href = "redireccion_por_rol.php";
                    }, 1500);
                } else {
                    estado.innerHTML = `❌ Frase no reconocida. Dijiste: "<i>${texto}</i>"<br>
                                       Intenta decir "<strong>ingresame al sistema</strong>" más claro.`;
                    estado.className = 'error';
                    logDebug('Frase no coincidente');
                }
            };

            reconocimiento.onerror = function(event) {
                let mensajeError = 'Error en el reconocimiento: ';
                switch(event.error) {
                    case 'no-speech':
                        mensajeError = 'No se detectó voz. Habla más fuerte.';
                        break;
                    case 'audio-capture':
                        mensajeError = 'No se pudo acceder al micrófono. Verifica los permisos.';
                        break;
                    case 'not-allowed':
                        mensajeError = 'Permiso para usar micrófono denegado. Actualiza los permisos.';
                        break;
                    default:
                        mensajeError += event.error;
                }
                
                estado.innerHTML = `❌ ${mensajeError}`;
                estado.className = 'error';
                logDebug(`Error en reconocimiento: ${event.error}`);
            };

            reconocimiento.onend = function() {
                logDebug('Reconocimiento finalizado');
            };
        }
    </script>
</body>
</html>