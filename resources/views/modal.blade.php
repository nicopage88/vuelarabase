<!DOCTYPE html>
<html>
<head>
    <title>Modal con Fecha</title>
</head>
<body>

<button onclick="mostrarModal()">Abrir Modal</button>

<div id="miModal" style="display: none;">
    <form action="/guardar-fecha" method="post">
        @csrf
        <label for="fecha">Selecciona una fecha futura:</label>
        <input type="date" id="fecha" name="fecha" required>
        <button type="submit">Guardar</button>
    </form>
</div>
<h4>Fechas Guardadas:</h4>
<ol>
    @foreach ($fechas as $fecha)
        <li>{{ $fecha->fecha }}</li>
    @endforeach
</ul>

<script>
    function mostrarModal() {
        document.getElementById('miModal').style.display = 'block';
    }
</script>

</body>
</html>
