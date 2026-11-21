
<?php 
    require_once "UsersController.php"; 

    $uc = new UsersController();
    $usuarios = $uc->get();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Usuarios</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 40px;
        }

        .contenedor {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #2563eb;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f8fafc;
        }

        tr:hover {
            background-color: #eaf2ff;
        }

        .vacio {
            text-align: center;
            color: #777;
        }
    </style>
</head>

<body>

    <div class="contenedor">

        <h1>Lista de Usuarios</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo electrónico</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($usuarios)): ?>

                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td>
                                <?= htmlspecialchars((string) $usuario['id']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($usuario['name']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($usuario['email']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                <?php else: ?>
                    <tr>
                        <td colspan="3" class="vacio">
                            No hay usuarios registrados.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>

</body>
</html>
