<div>

    @if ($message !="")
        <div class="alert alert-success" role="alert">
            <p>{{  _('Se agregó el consultorio:  '.$message.' con exito!')  }}</p>
            
        </div>
    @endif
    <form wire:submit.prevent="save">

        {{-- @csrf method="post"--}}

        <div class="col-md-6 col-xs-12">

            <input type="text" class="form-control" name="consultorio"
            placeholder="Ingrese Nuevo Consultorio" wire:model="consultorio" required>

        </div>

        <button type="submit" class="btn btn-primary">Agregar Consultorio</button>

    </form>

    
</div>
