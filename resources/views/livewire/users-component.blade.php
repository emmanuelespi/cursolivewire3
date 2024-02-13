<div style="width:800px; margin: 1rem auto; text-align: center;">
    <h1>{{ $title }} ({{ $usersCount }})</h1>
    <form wire:submit='createUser'>
        <input wire:model='name' type="text" placeholder="Nombre">
        <input wire:model='email' type="email" placeholder="Email">
        <input  wire:model='password' type="password" placeholder="Contraseña"><br><br>
        <button>Crear usuario</button>
    </form>

    <hr>
    @foreach ($users as $user)
        <h3>{{ $user->name }}</h3>
    @endforeach
</div>
