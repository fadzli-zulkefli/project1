<!-- No Ic Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_ic', 'No IC:') !!}
    <p>{{ $permohonan->no_ic }}</p>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $permohonan->name }}</p>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('negeri', 'Negeri:') !!}
    <p>{{ $permohonan->negeri }}</p>
</div>

{{-- }}
<div class="form-group col-sm-6">
    {!! Form::label('tarikh_permohonan', 'Tarikh Permohonan:') !!}
    <p>{{ $permohonan->tarikh_permohonan }}</p>
</div>


<!-- Kategori Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kategori', 'Kategori:') !!}
    <p>{{ $permohonan->kategori }} : {{ $kategoriList[ $permohonan->kategori ] }}</p>
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $permohonan->email }}</p>
</div>

<!-- No Tel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_tel', 'No Tel:') !!}
    <p>{{ $permohonan->no_tel }}</p>
</div>

<!-- No Akaun Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_akaun', 'No Akaun:') !!}
    <p>{{ $permohonan->no_akaun }}</p>
</div>

<!-- Nama Bank Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_bank', 'Nama Bank:') !!}
    <p>{{ $permohonan->nama_bank }}</p>
</div>



--}}