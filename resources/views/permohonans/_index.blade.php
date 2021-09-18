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
    </section>
    <div class="content">
        <div class="clearfix"></div>

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

