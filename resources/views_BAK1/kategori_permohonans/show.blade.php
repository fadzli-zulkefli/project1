@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kategori Permohonan
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('kategori_permohonans.show_fields')
                    <a href="{{ route('kategoriPermohonans.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
