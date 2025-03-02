<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>

</head>

<body>
    <header>
        <nav class="sidebar">
            <h1>Los Rosales</h1>
            <ul>
                <li><a onclick="showContent('registrar')">Registrar</a></li>
                <li><a onclick="showContent('cochera')">Cochera</a></li>
                <li><a onclick="showContent('caja')">Caja</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="registrar" class="registrar hidden">
            <form action="" class="form_Reg">
                <h2>Nuevo Conductor</h2>
                <div class="input-container">
                    <div class="input-column">
                        <div class="input-box">
                            <label>DNI:</label>
                            <input type="text" placeholder="DNI">
                        </div>
                        <div class="input-box">
                            <label>Nombre:</label>
                            <input type="text" placeholder="Nombre">
                        </div>
                        <div class="input-box">
                            <label>Apellido:</label>
                            <input type="text" placeholder="Apellido">
                        </div>
                        <div class="input-box">
                            <label>Teléfono:</label>
                            <input type="text" placeholder="Teléfono">
                        </div>
                    </div>
                    <div class="photo-column">
                        <label>Subir Foto:</label>
                        <input type="file" id="foto" accept="image/*" onchange="mostrarImagen(event)">
                        <img id="preview" src="#" alt="Vista previa de la imagen">
                    </div>
                </div>
                <button type="submit" class="register-btn">Registrar</button>
            </form>

            <form action="" class="form_Reg">
                <h2>Nuevo Vehiculo</h2>
                <div class="input-container">
                    <div class="input-column">
                        <div class="input-box">
                            <label>Placa:</label>
                            <input type="text" placeholder="Placa">
                        </div>
                        <div class="input-box">
                            <label>Placa(opcional):</label>
                            <input type="text" placeholder="Placa">
                        </div>
                        <div class="input-box">
                            <label>Fecha:</label>
                            <input type="text" placeholder="Fecha">
                        </div>
                        <div class="input-box">
                            <label>Hora:</label>
                            <input type="text" placeholder="Hora">
                        </div>
                    </div>
                    <div class="photo-column">
                        <label>Subir Foto:</label>
                        <input type="file" id="foto" accept="image/*" onchange="mostrarImagen(event)">
                        <img id="preview" src="#" alt="Vista previa de la imagen">
                    </div>
                </div>
                <button type="submit" class="register-btn">Registrar</button>
            </form>
        </section>

        <section id="cochera" class="cochera">
            <h2 class="title-cochera">Cochera</h2>
            <?php
            include("../controlador/conexion.php");
            include("../controlador/busqueda.php");
            ?>
            <div class="reserva-container">
                <div class="conductor">
                    <div class="search-container">
                        <form method="POST" action="">
                            <input type="text" id="dni-search" name="dni" placeholder="Buscar por DNI" value="<?php echo htmlspecialchars($dni); ?>">
                            <button type="submit">Buscar</button>
                        </form>
                    </div>

                    <?php if ($conductor): ?>
                        <div class="profile">
                            <h3>Perfil del Conductor</h3>
                            <strong>DNI:</strong><p><?php echo htmlspecialchars($conductor['dni']); ?></p>
                            <strong>Nombre:</strong><p><?php echo htmlspecialchars($conductor['nombre']); ?></p>
                            <strong>Apellido:</strong><p><?php echo htmlspecialchars($conductor['apellido']); ?></p>
                            <strong>Teléfono:</strong><p><?php echo htmlspecialchars($conductor['telefono']); ?></p>
                        </div>
                    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                        <p>No se encontró ningún conductor con ese DNI.</p>
                    <?php endif; ?>

                </div>
                <div class="Vehiculo">
                    <p>Selecione el Vehiculo</p>
                    <select>
                        <option value="">Semi Trailer</option>
                        <option value="">Camion y Remolque</option>
                        <option value="">Tracto</option>
                        <option value="">Semi Remolque</option>
                        <option value="">Camion Furgon</option>
                        <option value="">Remolque</option>
                        <option value="">Camion Mediano</option>
                        <option value="">Camion Chico</option>
                        <option value="">Camioneta</option>
                        <option value="">Auto</option>
                    </select>
                </div>
            </div>
        </section>

        <section id="caja" class="hidden">
            <h2>Caja</h2>
            <form action="">
                <fieldset>
                    <legend>Registro de Pago</legend>
                    <label>DNI/RUC:</label>
                    <input type="text" placeholder="DNI/RUC">
                    <label>Tipo de Vehiculo</label>
                    <select>
                        <option value="">Semi Trailer</option>
                        <option value="">Camion y Remolque</option>
                        <option value="">Tracto</option>
                        <option value="">Semi Remolque</option>
                        <option value="">Camion Furgon</option>
                        <option value="">Remolque</option>
                        <option value="">Camion Mediano</option>
                        <option value="">Camion Chico</option>
                        <option value="">Camioneta</option>
                        <option value="">Auto</option>
                    </select>
                    <label>Total a Pagar:</label>
                    <input type="text" placeholder="0.0">
                </fieldset>
            </form>
        </section>

    </main>
    <script>
        function showContent(section) {
            // Ocultar todas las secciones
            document.querySelectorAll('main > section').forEach(sec => {
                sec.classList.add('hidden');
            });

            // Mostrar solo la sección seleccionada
            document.getElementById(section).classList.remove('hidden');
        }

        function mostrarImagen(event) {
            const input = event.target; // Obtiene el input de tipo file
            const preview = document.getElementById('preview'); // Obtiene el elemento img

            if (input.files && input.files[0]) {
                const reader = new FileReader(); // Crea un FileReader

                reader.onload = function(e) {
                    preview.src = e.target.result; // Asigna la imagen al src del img
                    preview.style.display = 'block'; // Muestra la imagen
                };

                reader.readAsDataURL(input.files[0]); // Lee el archivo como URL
            } else {
                preview.src = '#'; // Limpia la imagen si no hay archivo
                preview.style.display = 'none'; // Oculta la imagen
            }
        }
    </script>
</body>

</html>

<?php
// Cerrar la conexión
$conn->close();
?>