<!-- No Ic Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_ic', 'No Ic:') !!}
    {!! Form::text('no_ic', null, ['class' => 'form-control']) !!}
</div>

<!-- Ip Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ip', 'Ip:') !!}
    {!! Form::text('ip', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('logSemakan2s.index') }}" class="btn btn-default">Cancel</a>
</div>
