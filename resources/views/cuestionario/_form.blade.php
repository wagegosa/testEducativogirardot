<div class="form-group">
    @php $questions_count = 1;@endphp
    @foreach($questions as $data)
        <div class="ml-4">
            <h4>
                {!! str_pad($questions_count++,2,'0',STR_PAD_LEFT) .'. '. $data->title !!}
                {!! Form::hidden('question_id['.$data->id.']', $data->id) !!}
            </h4>
            @php $answers_count = 1; @endphp
            @foreach($data->answers as $answer)
                <div class="ml-4">
                    <b>{{ $answers_count++ }}). </b>
                    <label>
                        {!! $answer->description !!}
                        <input type="radio" id="rad_{{
                    $questions_count-1 }}" name="answer_id[{{ $questions_count-1 }}]" data-id="{{
                    $questions_count-1 }}" value="{{ $answer->id }}">
                    </label>


                </div>
            @endforeach
        </div>
    @endforeach

</div>

<div class="form-group">
    <div class="d-flex justify-content-between">
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