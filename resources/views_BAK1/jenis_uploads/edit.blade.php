@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Jenis Upload
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($jenisUpload, ['route' => ['jenisUploads.update', $jenisUpload->id], 'method' => 'patch']) !!}

                        @include('jenis_uploads.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection