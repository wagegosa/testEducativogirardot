<div class="row form-group">
    {!! Form::label('', 'Nombre del permiso', ['class' => 'col-sm-3 col-form-label text-right'])
     !!}
    <div class="col-sm-9">
        {!! Form::text('name', isset($permiso) ? $permiso->name : '', ['class' => 'form-control'])
         !!}
        @error('name')
        <span class="text-danger m-b-none">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-12 d-flex justify-content-between">
        <button class="btn btn-white"
                type="button"
                onclick="window.location='{{ route('permisos.index') }}'">
            <i class="fa fa-chevron-circle-left fa-lg"></i> Cancelar registro
        </button>
        <button class="btn btn-primary"
                type="submit">
            {!! $btnIco !!} {{ $btnText }}
        </button>
    </div>
</div>