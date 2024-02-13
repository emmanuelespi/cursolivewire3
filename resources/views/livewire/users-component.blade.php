<div wire:poll.5s class="container">
    <div class="row">
        <h1 class="text-center mt-4">{{ $title }} ({{ $usersCount }})</h1>
        <hr>

        @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
        @endif

        <div class="col-12 col-md-6">
            <h3>Listado de usuarios</h3>
            <hr>
            

            @php
                $search = "";
            @endphp
            <livewire:list-users :search="$search" />
        </div>
        <div class="col-12 col-md-6">
            <h3>Crear usuarios</h3>
            <hr>

            <form wire:submit='createUser'>
                <div class="mb-3">
                    <input wire:model='name' class="form-control" type="text" placeholder="Nombre">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input wire:model='email' class="form-control" type="email" placeholder="Email">
                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input wire:model='password' class="form-control" type="password" placeholder="Contraseña">
                    @error('password')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input wire:model='image' type="file" accept="image/png, image/jpeg">
                    <div wire:loading wire:target='image' class="spinner-border" style="width: 2rem; height: 2rem;" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    @error('image')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="mt-3 text-center">
                        @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" widht="100px">
                        @endif
                    </div>
                </div>
                <button wire:loading.attr='disabled' wire:targe='createUser' class="btn btn-primary">Crear usuario</button>
                <div wire:loading wire:target='createUser'>
                    Enviando...
                </div>
            </form>
        </div>
    </div>
</div>