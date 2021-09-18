@extends('layouts.app')

@section('css')
    @include('layouts.datatables_css')
@endsection

@push('scripts')

<!-- Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

<script>

//
$(document).ready( function () {
    $('#tblMain').DataTable();
} );

</script>

@endpush

@section('content')

<section class="content-header">
    <h1 class="pull-left">{{ config("app.name") }}</h1>
    <h1 class="pull-right">

    </h1>
</section>

<br/><br/>

<div style="margin:0" class="container">




    <div style="width:100%;" class="row">
        <div style="width:100%;" class="col-md-12">

            <div style="width:100%;" class="box box-primary">
                <div style="width:100%;" class="box-body">

                <a href="{{ url("/admin") }}" class="">
            <b>Senarai Log Pengguna : </b>
        </a>

        <table id="tblMain" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>IC</th>
                    <th>Nama</th>
                    <th>Tarikh/Masa</th>
                    <th>IP Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach($log_semakan as $i=>$l)
                    <tr>
                    <td>{{ $i+1 }}</td>
                        <td>{{ $l->no_ic }}</td>
                        <td>{{  $l->name }}</td>
                        <td>{{  $l->created_at  }}</td>
                        <td>{{   $l->ip }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

    </div>
    </div>
</div>

@endsection
