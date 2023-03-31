<div class="row form-group">
    {!! Form::label('', 'Nombre(s) y Apellidos', ['class' => 'col-sm-3 col-form-label text-right'])
     !!}
    <div class="col-sm-9">
        {!! Form::text(
            'name', '',
            [
                'id' => 'name',
                'class' => 'form-control',
                'placeholder' => 'Como aparece en el documento de identidad'
            ])
        !!}
        @error('name')
        <span class="text-danger m-b-none">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row form-group">
    {!! Form::label('', 'Correo electrónico', ['class' => 'col-sm-3 col-form-label text-right']) !!}
    <div class="col-sm-9">
        {!! Form::email(
            'email', '',
            [
                'id' => 'email',
                'class' => 'form-control',
                'placeholder' => 'Ej. correo@mail.com'
            ])
         !!}
        @error('email')
        <span class="text-danger m-b-none">{{ $message }}</span>
        @enderror
    </div>
</div>
<h5 class="m-t-none m-b" id="password">
    Usa 8 o mas caracteres con una combinación de letras, números y símbolos.
</h5>
<div class="row form-group">
    {!! Form::label('', 'Contraseña', ['class' => 'col-sm-3 col-form-label text-right']) !!}
    <div class="col-sm-9">
        {!! Form::password('password', ['id' => 'password', 'class' => 'form-control']) !!}
        @error('password')
        <span class="text-danger m-b-none">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row form-group">
    {!! Form::label('', 'Confirmar contraseña', ['class' => 'col-sm-3 col-form-label text-right']) !!}
    <div class="col-sm-9">
        {!! Form::password('confirm-password', ['id' => 'password-confirm', 'class' => 'form-control']) !!}
    </div>
</div>
<div class="row form-group">
    {!! Form::label('', 'Rol / Perfil de Usuario', ['class' => 'col-sm-3 col-form-label
    text-right']) !!}
    <div class="col-sm-9">
        @foreach($roles as $role)
            <div class="i-checks">
                <label>
                    {!! Form::checkbox('roles[]', $role, null, ['class' => 'mr-1']) !!}
                    {!! $role !!}
                </label>
            </div>
        @endforeach
        @error('roles')
        <span class="text-danger m-b-none">{{ $message }}</span>
        @enderror
    </div>
</div>
<hr class="hr-line-dashed">
<div class="form-group row">
    <div class="col-sm-12 d-flex justify-content-between">
        <button class="btn btn-white" type="button" onclick="window.location='{{ route('usuarios.index') }}'">
            <i class="fa fa-chevron-circle-left fa-lg"></i> Cancelar registro
        </button>
        <button class="btn btn-primary" type="submit">
            {!! $btnIco !!} {{ $btnText }}
        </button>
    </div>
</div>