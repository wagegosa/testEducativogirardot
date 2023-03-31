<div class="row form-group">
    {!! Form::label('', 'Rol/Perfil', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-6">
        <div class="form-control-static">{{ $role->name }}</div>
    </div>
</div>
<hr class="hr-line-dashed">
<div class="form-group">
    <h4><span class="glyphicons glyphicons-lock"></span> PERMISOS SOBRE ROL</h4>
    {!! Form::select(
        'permission[]',
        $permissions, isset($rolePermissions)?$rolePermissions:'',
        [
            'id' => 'permission',
            'multiple' => 'multiple',
            'class' => 'form-control dual_select'
        ]
    ) !!}
    @error('permission')
    <span class="text-danger m-b-none">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <button name="submit" type="submit" class="btn btn-primary">{{ $btnText }}</button>
</div>