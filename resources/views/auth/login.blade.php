<form action="{{ route('login.authenticate') }}" method="POST">
    @csrf
    <label for="email">Correo Electrónico:</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password" required>

    <button type="submit">Iniciar Sesión</button>
</form>
