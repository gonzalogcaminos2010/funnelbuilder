<form action="{{ route('register.store') }}" method="POST">
    @csrf
    <label for="name">Nombre:</label>
    <input type="text" name="name" id="name" required>

    <label for="email">Correo Electrónico:</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password" required>

    <label for="password_confirmation">Confirmar Contraseña:</label>
    <input type="password" name="password_confirmation" id="password_confirmation" required>

    <button type="submit">Registrarse</button>
</form>
