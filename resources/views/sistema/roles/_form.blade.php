<div class="row form-group">
    {!! Form::label('', 'Rol/Perfil', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('name', isset($role)?$role->name:'', ['class' => 'form-control']) !!}
        @error('name')
        <span class="text-danger m-b-none">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-12 d-flex justify-content-between">
        <button class="btn btn-white"
                type="button"
                onclick="window.location='{{ route('roles.index') }}'">
            <i class="fa fa-chevron-circle-left fa-lg"></i> Cancelar registro
        </button>
        <button class="btn btn-primary"
                type="submit">
            {!! $btnIco !!} {{ $btnText }}
        </button>
    </div>
</div>