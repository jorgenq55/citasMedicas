<div>
    @if (session('messageActualiza'))
        <div class="alert alert-success" role="alert">{{ session('messageActualiza') }}
        </div>
    @endif

    <form wire:submit.prevent="update">

        <input type="hidden" class="form-control input-lg" name="id" wire:model="id">
        <div class="row">
            <div class="col-md-6">
                <h2>Nombre y Apellido:</h2>
                <input type="text" class="form-control input-lg" name="name" wire:model.lazy="name">
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <h2>Documento:</h2>
                <input type="text" class="form-control input-lg" name="documento" wire:model="documento">
                @error('documento')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h2>Email:</h2>
                <input type="text" class="form-control input-lg" name="email" wire:model="email">
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <h2>Teléfono:</h2>
                <input type="text" class="form-control input-lg" name="telefono" wire:model="telefono">
                @error('telefono')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h2>Consultorio:</h2>
                <select class="form-control input-lg" name="consultorio" wire:model="consultorio">
                    <option value="">Seleccionar Consultorio...</option>
                    @foreach ($consultorios as $consultorio)
                        <option value="{{ $consultorio->id }}">{{ $consultorio->consultorio }}</option>
                    @endforeach
                </select>
                @error('consultorio')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6">
                <h2>Genero:</h2>
                <select class="form-control input-lg" name="sexo" wire:model="sexo">
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                     
                </select>
                @error('sexo')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h2>Rol:</h2>
                <select class="form-control input-lg" name="rol" wire:model="rol">
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
        <br><br>

        <div class="row">
            <div class="col-md-4"> </div>
            <div class="col-md-2">
                <button class="btn btn-primary btn-lg"  type="submit"><i class="fa fa-floppy-o" aria-hidden="true"> </i> ACTUALIZAR</button>
            </div>
            <div class="col-md-2">
                <button wire:click="regresar" class="btn btn-warning btn-lg" type="button">↩ REGRESAR</button>
                </a>

            </div>
        </div>
    </form>

    <section class="content">
        <div class="box">
            <form method="post" role="form" action="{{ url('Usuario-contraseña') }}">
                @csrf
            <div class="box-body">
                <div class="row">

                    <div class="col-md-6">
                        <h2>Cambiar Contraseña</h2>
                        <input type="password" class="form-control input-lg" name="password" placeholder="Ingresa la nueva contraseña" value="">
                        @error('password')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <br><br><br>

                    <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                </div>
            </div>
        </form>
        </div>
    </section>
</div>
