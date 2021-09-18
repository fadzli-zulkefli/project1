@extends('layouts.public')

@section('content')


<br/><br/> <br/><br/> <br/><br/>



<div class="content-center text-center">
      <div class="col-md-12 ml-auto mr-auto">
        <div class="brand">

        <img style="height: 140px;" src="{{ asset('/') }}img/nadma_logo.png">

          <h3 class="title">
            {{ config('app.name') }}
          </h3>


          <br />







          <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="card bg-secondary shadow border-0">

            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-uppercase-OLD mb-4">
              {{-- }}
                PERMOHONAN ANDA TELAH DIHANTAR PADA {{ $permohonan->tarikh_permohonan }}.<br/>
                SEBARANG MAKLUMBALAS AKAN DIHANTAR MELALUI EMEL YANG DIDAFTARKAN DI DALAM SISTEM INI.<br/><br/>
                SEKIAN TERIMA KASIH.
                --}}

              @if(!empty($permohonan->name))
                Nama : {{ $permohonan->name }} <br/><br/>
              @endif

              @if($permohonan->status==1)
              {{ env('STATUS_LULUS') }}
              @elseif($permohonan->status==-1)
              {{ env('STATUS_GAGAL') }}
              @else 
                {{ env('STATUS_TIADA') }}
              @endif

              </div>

              <a href="{{ url('/') }}"  class="btn btn-primary btn-round btn-lg">Kembali Ke Laman Utama</a>

            </div>
          </div>




        </div>
      </div>








          <br/><br/> <br/><br/> <br/><br/> <br/><br/>
        </div>


      </div>
    </div>




@endsection


@section('myjs')


<script>

    $(document).ready(function(){


$('#no_ic').mask('000000-00-0000', {placeholder: "_____-__-____"});

    });




</script>


@endsection
