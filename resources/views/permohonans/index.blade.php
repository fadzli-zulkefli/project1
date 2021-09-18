@extends('layouts.app')

@section('css')
    <style>
        table.dataTable thead th:first-child {
            width: 5%;
        }
        table.dataTable thead th:nth-child(2) {
            width: 10%;
        }
        table.dataTable thead th:nth-child(3) {
            width: 20%;
        }
        table.dataTable thead th:nth-child(4) {
            width: 10%;
        }
        table.dataTable thead th:nth-child(5) {
            width: 10%;
        }
        table.dataTable thead th:nth-child(6) {
            width: 20%;
        }
       
        table.dataTable thead th:last-child{
            width: 30%;
        }
    </style>
@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left">SENARAI PERMOHONAN BANTUAN KHAS COVID19</h1>
{{--
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('permohonans.create') }}">Add New</a>
        </h1>
--}}
         <a class="btn btn-primary pull-right" style="margin-left: 5px; margin-right: 5px; margin-top: -10px;margin-bottom: 5px" onclick="$('#divImportCsv').toggle();" hrefOLD="">Import CSV</a>
                   &nbsp;  &nbsp; 
    </section>
    <div class="content">
        <div class="clearfix"></div>

        <div id="divImportCsv" style="display:none;" >
            <br/>
            
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Import CSV file</h3>
                <span class="label label-success pull-right"><i class="fa fa-html5"></i></span>
              </div><!-- /.box-header -->
              <div class="box-body">

              <form id="formImportCsv" action="{{ url('/pemohon/import') }}" method="post" 
              enctype="multipart/form-data">

              @csrf

                <p>1) Prepare Data Following This Template CSV File : <a download href="{{ asset('import.csv') }}">Download Template</a></p>
                <p>2) Upload The File : </p>

                <span class="form-control control-fileupload">
         {{--  <label for="filecsv">Choose a file :</label>--}}
          <input type="file" id="filecsv" name="filecsv">
        </span>

            <br/>


                <a onclick="$('#formImportCsv').submit();" type="submit" class="btn btn-success">
                <i class="fa fa-upload"></i> Upload & Import</a>

                <br/><br/>
                <div id="msgImport"></div>

                </form>
              </div><!-- /.box-body -->
            </div>

            <br/>
        </div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('permohonans.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

