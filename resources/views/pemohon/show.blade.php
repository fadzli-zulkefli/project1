@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detail
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('pemohon.show_fields')


                {{-- 
                    @foreach($PermohonanUpload as $p)
                    @if($latest_batch->created_at == $p->created_at)
                        Dokumen : {{ $JenisUpload[$p->jenis_upload_id] }}<br/>
                        File : <a target="_blank" href="{{ url('/get_file')."/".$p->file_path }}">View</a><br/>
                        Uploaded At : {{ $p->created_at }}<br/><br/>
                    @endif
                    @endforeach
                --}}
                    <br/>

                    <a href="{{ route('pemohon.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
