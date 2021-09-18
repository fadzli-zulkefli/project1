{!! Form::open(['route' => ['permohonans.destroy', $id], 'method' => 'delete']) !!}
{{--<div class='btn-group'>--}}
    <a href="{{ route('permohonans.show', $id) }}" class='btn btn-default btn-sm'>
        <i class="glyphicon glyphicon-eye-open"></i> View / Edit
    </a>
    &nbsp; &nbsp;

{{-- 
    <a href="{{ route('permohonans.edit', $id) }}" class='btn btn-default btn-sm'>
        <i class="glyphicon glyphicon-edit"></i> Edit
    </a>

    &nbsp; &nbsp;

--}}

    {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Delete', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-sm',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
{{--</div>--}}
{!! Form::close() !!}
