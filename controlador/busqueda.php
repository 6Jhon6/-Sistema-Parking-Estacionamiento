<?php
$dni = '';
$conductor = null;

// Procesar la búsqueda si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dni = $_POST['dni'];

    // Buscar el conductor en la base de datos
    $sql = "SELECT * FROM conductor WHERE dni LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%$dni%";
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $conductor = $result->fetch_assoc();
    }
}
?>