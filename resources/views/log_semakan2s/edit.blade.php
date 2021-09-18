@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Log Semakan2
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($logSemakan2, ['route' => ['logSemakan2s.update', $logSemakan2->id], 'method' => 'patch']) !!}

                        @include('log_semakan2s.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection