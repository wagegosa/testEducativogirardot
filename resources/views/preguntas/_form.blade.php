<div class="form-group">
    {!! Form::label('title', 'Título', ['class' => 'form-label required']) !!}
    {!! Form::textarea('title', isset($pregunta) ? $pregunta->title : '', ['id' => 'title', 'class' => 'form-control summernote']) !!}
    @error('title')
    <span class="text-danger m-b-none">{{ $message }}</span>
    @enderror
</div>

@if(isset($answers))
    <table class="table">
        <thead>
            <tr>
                <th>Opción</th>
                <th>Respuesta</th>
            </tr>
        </thead>
        <tbody>
        @foreach($answers as $answer)
            <tr>
                <td>
                    <div class="i-checks">
                        {!! Form::hidden('item[]', $answer->id, []) !!}
                        {!! Form::radio('is_correct[]', $answer->id,
                        $answer->is_correct) !!}
                    </div>
                </td>
                <td>
                    {!! Form::text('description[]', $answer->description, ['class' =>
                    'form-control']) !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <table class="table">
        <tfoot>
        <tr>
            <td class="align-middle" width="12%">Opción correcta</td>
            <td class="align-middle" width="83%">Respuesta</td>
            <td class="align-middle" width="5%">
                <a href="javascript:void(0)"
                   class="btn btn-md btn-success addRow">
                    <i class="fa fa-plus-square-o"></i>
                </a>
            </td>
        </tr>
        </tfoot>
        <tbody>

        </tbody>
    </table>
@endif


<div class="form-group">
    <div class="col-sm-12 d-flex justify-content-between">
        <button class="btn btn-white"
                type="button"
                onclick="window.location='{{ route('preguntas.index') }}'">
            <i class="fa fa-chevron-circle-left fa-lg mr-2"></i>Cancelar registro
        </button>
        <button class="btn btn-primary"
                type="submit">
            {!! $btnIco !!} {{ $btnText }}
        </button>
    </div>
</div>