<div class="form-group">
    {!! Form::label('career', 'Carrera / Programa de Pregrado', ['class' => 'form-label required'])
     !!}
    {!! Form::text('career', null, ['id' => 'career', 'class' => 'form-control
    text-uppercase']) !!}
    @error('career')
    <span class="text-danger m-b-none">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <div class="d-flex justify-content-between">
        <button class="btn btn-white"
                type="button"
                onclick="window.location='{{ route('pregrado.index') }}'">
            <i class="fa fa-chevron-circle-left fa-lg mr-2"></i>Cancelar registro
        </button>
        <button class="btn btn-primary"
                type="submit">
            {!! $btnIco !!} {{ $btnText }}
        </button>
    </div>
</div>