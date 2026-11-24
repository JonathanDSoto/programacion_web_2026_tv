<?php 
    require_once "UsersController.php"; 

    $uc = new UsersController(); 

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        

    }


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

        fieldset {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 25px;
            min-width: 0;
        }

        legend {
            font-weight: bold;
            color: #333;
            padding: 0 10px;
        }

        .campo {
            margin-bottom: 20px;
        }

        .campo label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        .campo input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            box-sizing: border-box;
        }

        .campo input:focus {
            border-color: #2563eb;
            outline: none;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .campo small {
            display: block;
            margin-top: 6px;
            color: #777;
            font-size: 13px;
        }

        .acciones {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        .acciones button {
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
        }

        .btn-guardar {
            background-color: #2563eb;
            color: white;
        }

        .btn-guardar:hover {
            background-color: #1d4ed8;
        }

        .btn-cancelar {
            background-color: #e5e7eb;
            color: #333;
        }

        .btn-cancelar:hover {
            background-color: #d1d5db;
        }

    </style>
</head>

<body>

    <div class="contenedor">

        <h1>
            Agregar usuario
        </h1>
        
        
    <form action="UsersController.php" method="POST">

        <fieldset>
            <legend>Datos del usuario</legend>

            
            <div class="campo">
                <label for="name">Nombre completo:</label>
                <input 
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Ingresa tu nombre"
                    minlength="3"
                    maxlength="100"
                    pattern="\p{L}+(?:[ '\-]\p{L}+)*"
                    title="Ingresa únicamente letras, espacios, apóstrofes o guiones."
                    autocomplete="name"
                    required
                >
            </div>

            <div class="campo">
                <label for="email">Correo electrónico:</label>
                <input 
                    type="email"
                    id="email"
                    name="email"
                    placeholder="usuario@correo.com"
                    maxlength="150"
                    pattern="[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9\-]+(?:\.[a-zA-Z0-9\-]+)*\.[a-zA-Z]{2,}"
                    title="Ingresa un correo electrónico válido."
                    autocomplete="email"
                    required
                >
            </div>

            <div class="campo">
                <label for="password">Contraseña:</label>
                <input 
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Ingresa tu contraseña"
                    minlength="8"
                    maxlength="64"
                    pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\p{P}\p{S}]).{8,64}"
                    title="Debe contener una mayúscula, una minúscula, un número y un carácter especial."
                    autocomplete="new-password"
                    required
                >
                <small>
                    La contraseña debe contener entre 8 y 64 caracteres,
                    incluyendo una mayúscula, una minúscula, un número
                    y un carácter especial.
                </small>
            </div>


            <div class="acciones">
                <button type="reset" class="btn-cancelar">
                    Limpiar
                </button>

                <button type="submit" class="btn-guardar">
                    Guardar usuario
                </button>
            </div>

            <input type="hidden" name="action" value="create_user">

        </fieldset>

    </form>


    </div>

</body>
</html>













