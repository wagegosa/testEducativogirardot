<div class="form-group">
    @foreach($questions as $question)
        <p>
            <h5>{!! $question->title !!}</h5>
            {!! Form::hidden('question_id['.$question->id.']', $question->id, []) !!}
            @foreach($question->answers as $key => $answer)
                <div class="i-checks">
                    <label>
                        {!! $answer->description !!}
                        {!! Form::radio('is_correct['.$answer->id.']', $answer->id) !!}
                    </label>
                </div>
            @endforeach
        </p>
    @endforeach
</div>

<div class="form-group">
    <div class="col-sm-12 d-flex justify-content-between">
        <button class="btn btn-white"
                type="button"
                onclick="window.location='{{ route('home') }}'">
            <i class="fa fa-chevron-circle-left fa-lg mr-2"></i>Cancelar registro
        </button>
        <button class="btn btn-primary"
                type="submit">
            {!! $btnIco !!} {{ $btnText }}
        </button>
    </div>
</div>