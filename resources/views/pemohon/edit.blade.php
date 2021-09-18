@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Edit Detail
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($permohonan, ['route' => ['pemohon.update', $permohonan->id], 'method' => 'patch']) !!}

                        @include('pemohon.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection