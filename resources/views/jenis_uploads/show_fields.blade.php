<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $jenisUpload->name }}</p>
</div>

<!-- Template File Field -->
<div class="form-group">
    {!! Form::label('template_file', 'Template File:') !!}
    <p>{{ $jenisUpload->template_file }}</p>
</div>

<!-- Kategori 1 Field -->
<div class="form-group">
    {!! Form::label('kategori_1', 'Kategori 1:') !!}
    <p>{{ $jenisUpload->kategori_1 }}</p>
</div>

<!-- Kategori 1 Wajib Field -->
<div class="form-group">
    {!! Form::label('kategori_1_wajib', 'Kategori 1 Wajib:') !!}
    <p>{{ $jenisUpload->kategori_1_wajib }}</p>
</div>

<!-- Kategori 2 Field -->
<div class="form-group">
    {!! Form::label('kategori_2', 'Kategori 2:') !!}
    <p>{{ $jenisUpload->kategori_2 }}</p>
</div>

<!-- Kategori 2 Wajib Field -->
<div class="form-group">
    {!! Form::label('kategori_2_wajib', 'Kategori 2 Wajib:') !!}
    <p>{{ $jenisUpload->kategori_2_wajib }}</p>
</div>

<!-- Item Order Field -->
<div class="form-group">
    {!! Form::label('item_order', 'Item Order:') !!}
    <p>{{ $jenisUpload->item_order }}</p>
</div>

