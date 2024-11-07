<div>
    <form wire:submit.prevent="save">

        {{-- @csrf method="post" --}}
        <div class="row">
            <div class="col-md-3">
                <label for="name">Nombre y Apellido</label>
            </div>
            <div class="col-md-9">
                <input class="form-control" type="text" name="name" placeholder="Ingrese Nombre y Apellido"
                    wire:model="name">
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-md-3">
                <label for="sexo">Genero</label>
            </div>
            <div class="col-md-9">
                <select class="col-sm-8 form-control" name="sexo" wire:model="sexo">
                    <option value="">Seleccionar Genero...</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
                @error('sexo')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-md-3">
                <label for="consultorio">Consultorio</label>
            </div>
            <div class="col-md-9">
                <select class="form-control" name="consultorio" wire:model="consultorio">
                    <option value="">Seleccionar Consultorio...</option>
                    @foreach ($consultorios as $consultorio)
                        <option value="{{ $consultorio->id }}">{{ $consultorio->consultorio }}</option>
                    @endforeach
                </select>
                @error('consultorio')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <label for="rol">Rol</label>
            </div>
            <div class="col-md-9">
                <select class="form-control" name="rol" wire:model="rol">
                    <option value="">Seleccionar Rol...</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Secretaria">Secretaria</option>
                    <option value="Paciente">Paciente</option>
                </select>
                @error('rol')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <label for="telefono">Teléfono</label>
            </div>
            <div class="col-md-9">
                <input class="form-control" type="text" name="telefono" placeholder="Ingrese el telefono"
                    wire:model="telefono">
                @error('telefono')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <label for="documento">Documento</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" name="documento" placeholder="Ingrese el número de documento"
                    wire:model="documento">
                @error('documento') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <label for="email">Email</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" name="email" placeholder="Ingrese el correo"
                    wire:model="email">
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <label for="Constraseña">Constraseña</label>
            </div>
            <div class="col-md-9">
                <input type="password" class="form-control" name="password" placeholder="Ingrese la contraseña"
                    wire:model="password">
                @error('password') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Agregar Usuario</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

    </form>
</div>
