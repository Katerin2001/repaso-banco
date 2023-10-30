<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cedula = $_POST['cedula'];

    $sql = "SELECT cl.id, cl.nombre, cl.apellido, cu.cuenta, cu.saldo, tr.monto, tr.tipo_transaccion
            FROM cliente cl
            INNER JOIN cuenta cu ON cl.id = cu.cliente
            LEFT JOIN transaccion tr ON cu.cuenta = tr.idcuenta
            WHERE cl.id = :cedula";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':cedula', $cedula, PDO::PARAM_INT);
    $stmt->execute();
    
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($result)) {
        foreach ($result as $row) {
            echo "ID Cliente: " . $row['id'] . "<br>";
            echo "Nombre: " . $row['nombre'] . "<br>";
            echo "Apellido: " . $row['apellido'] . "<br>";
            echo "Cuenta: " . $row['cuenta'] . "<br>";
            echo "Saldo: " . $row['saldo'] . "<br>";
            echo "Tipo de Transacción: " . $row['tipo_transaccion'] . "<br>";
            echo "Monto: " . $row['monto'] . "<br><br>";
        }
    } else {
        echo "Cliente no encontrado.";
    }
}
?>
