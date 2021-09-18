@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            User
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}

                        <!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Verified At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('admin', 'Admin:') !!}
    {!! Form::select('admin', array('0' => '0 - User', '1' => '1 - Admin'),$user->admin , ['class' => 'form-control','id'=>'admin']) !!}
</div>



@if(Auth::user()->id == $user->id) {{-- If I edit myself, can edit password --}}



<!-- Password Field -->
<div class="form-group col-sm-6">

<input onchange="onchange_chk_edit_password(this)" type="checkbox" id="edit_password" name="edit_password" value="yes">
<label for="edit_password"> Edit Password ?</label><br>

    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control','disabled'=>'disabled']) !!}
</div>

@endif


@push('scripts')

<script type="text/javascript">

function onchange_chk_edit_password(elm){
    if($(elm).prop('checked')==true){
        $("#password").attr("disabled",false);
    }else{
        $("#password").attr("disabled",true);
    }
}

</script>

@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
</div>


                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection


