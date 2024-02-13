<div wire:poll.5s>
    <div class="d-flex">
        <select wire:model.live='numberRows' class="form-control" style="width:3rem; margin-right:1rem">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
        </select>
        <input wire:model.live='search' type="text" class="form-control" placeholder="Buscar...">
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($this->users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <img src="{{ Storage::url('public/'.$user->image) }}" width="50px">
                </td>
            </tr>
            @endforeach
        </tbody>
    
    </table>
    {{ $this->users->links() }}
</div>

