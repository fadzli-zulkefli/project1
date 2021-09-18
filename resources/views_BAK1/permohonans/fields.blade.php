<!-- No Ic Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_ic', 'No Ic:') !!}
    {!! Form::text('no_ic', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

{{-- 
<!-- Kategori Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kategori', 'Kategori:') !!}
    {!! Form::number('kategori', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- No Tel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_tel', 'No Tel:') !!}
    {!! Form::text('no_tel', null, ['class' => 'form-control']) !!}
</div>

<!-- No Akaun Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_akaun', 'No Akaun:') !!}
    {!! Form::text('no_akaun', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Bank Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_bank', 'Nama Bank:') !!}
    {!! Form::text('nama_bank', null, ['class' => 'form-control']) !!}
</div>

--}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('permohonans.index') }}" class="btn btn-default">Cancel</a>
</div>
