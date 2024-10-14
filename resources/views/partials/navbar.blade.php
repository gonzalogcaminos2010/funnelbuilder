<nav class="bg-gray-800 p-4 text-white">
    <div class="container mx-auto flex justify-between">
        <a href="{{ route('dashboard') }}" class="font-semibold text-xl">ClickFunnels</a>
        <ul class="flex space-x-4">
            <li><a href="{{ route('funnels.index') }}">Funnels</a></li>
            <li><a href="{{ route('leads.index') }}">Leads</a></li>
            <li><a href="{{ route('transactions.index') }}">Transacciones</a></li>
            <li><a href="#">Perfil</a></li>
        </ul>
    </div>
</nav>
