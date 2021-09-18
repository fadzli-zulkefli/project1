<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Template File Field -->
<div class="form-group col-sm-6">
    {!! Form::label('template_file', 'Template File:') !!}
    {!! Form::text('template_file', null, ['class' => 'form-control']) !!}
</div>

<!-- Kategori 1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kategori_1', 'Kategori 1:') !!}
    {!! Form::number('kategori_1', null, ['class' => 'form-control']) !!}
</div>

<!-- Kategori 1 Wajib Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kategori_1_wajib', 'Kategori 1 Wajib:') !!}
    {!! Form::number('kategori_1_wajib', null, ['class' => 'form-control']) !!}
</div>

<!-- Kategori 2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kategori_2', 'Kategori 2:') !!}
    {!! Form::number('kategori_2', null, ['class' => 'form-control']) !!}
</div>

<!-- Kategori 2 Wajib Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kategori_2_wajib', 'Kategori 2 Wajib:') !!}
    {!! Form::number('kategori_2_wajib', null, ['class' => 'form-control']) !!}
</div>

<!-- Item Order Field -->
<div class="form-group col-sm-6">
    {!! Form::label('item_order', 'Item Order:') !!}
    {!! Form::number('item_order', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('jenisUploads.index') }}" class="btn btn-default">Cancel</a>
</div>
