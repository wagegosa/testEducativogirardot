<div class="row form-group">
    {!! Form::label('', 'Nombre(s) y Apellidos', ['class' => 'col-sm-3 col-form-label text-right'])
     !!}
    <div class="col-sm-9">
        {!! Form::text(
            'name', $usuario->name,
            [
                'id' => 'name',
                'class' => 'form-control',
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
            'email', $usuario->email,
            [
                'id' => 'email',
                'class' => 'form-control',
            ])
         !!}
        @error('email')
        <span class="text-danger m-b-none">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row justify-content-md-center">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-9">
        <h5 class="m-t-none m-b">
            Usa 8 o mas caracteres con una combinación de letras, números y símbolos.
        </h5>
    </div>
</div>
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
        <span>Deje esto en blanco si no desea cambiar la contraseña.</span>
    </div>
</div>
@hasanyrole('Super-Admin|Administrador')
<div class="row form-group">
    {!! Form::label('', 'Rol / Perfil de Usuario', ['class' => 'col-sm-3 col-form-label
    text-right']) !!}
    <div class="col-sm-9">
        @foreach($roles as $role)
            <div class="i-checks">
                <label>
                    {!! Form::checkbox('roles[]', $role, $userRole, ['class' => '']) !!}
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
@endhasanyrole
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