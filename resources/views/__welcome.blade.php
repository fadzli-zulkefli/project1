@extends('layouts.public')
@section('myhead')
{!! htmlScriptTagJsApi(["lang"=>"en"]) !!}
@endsection
@section('content')
<br/><br/> <br/><br/> <br/><br/>
<div class="content-center text-center">
  <div class="col-md-12 ml-auto mr-auto">
    <div class="brand">
      <img style="height: 140px;" src="{{ asset('/') }}img/nadma_logo.png">
      <h3 class="title">
      SEMAKAN STATUS KELULUSAN PERMOHONAN<br>BANTUAN KHAS COVID-19 NADMA
      </h3>
      <h4 styleOLD="margin" class="description">
      <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
          <ol class="">
            Portal ini adalah khusus bagi menyemak status permohonan yang telah lulus bagi Bantuan Khas COVID-19 NADMA. Semua permohonan yang lengkap dan layak adalah tertakluk kepada semakan data KKM Putrajaya bagi data kurantin/wad/kematian sebelum diluluskan. Pemohon boleh menyemak status kelulusan selepas 14 hari bekerja dari tarikh permohonan lengkap diterima oleh NADMA.
            
            <br>
          </ol>
        </div>
        <div class="col-md-3">
        </div>
      </div>




      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-uppercase mb-4">
                @include('flash::message')
                <strong>MASUKKAN NO. KAD PENGENALAN</strong>
              </div>
              <form onsubmit="return onsubmit_form()" action="{{ url('/semakan') }}" method="POST" role="form">
                @csrf
                <div class="form-group mb-3">

                   <div class="text-left">
                  <input type="radio" id="bantuan" name="jenis_bantuan" value="bantuan">
                  <label for="male">Bantuan Khas 100/hari (masukkan kad pengenalan pemohon) </label><br>
                  <input type="radio" id="bantuan_kematian" name="jenis_bantuan" value="bantuan_kematian">
                  <label for="female">Bantuan Khas  Pengurusan Kematian (Masukkan Kad Pengenalan Si Mati)</label><br>
                </div>

                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-credit-card"></i></span>
                    </div>
                    <input id="no_ic" name="no_ic" class="form-control"
                    value="{{ old('no_ic') }}"
                    placeholder="NO. KAD PENGENALAN ANDA" type="text" required="required"
                    autocomplete="off" data-mask="000000-00-0000" maxlength="14" >
                  </div>
                </div>
                @error('no_ic')
                <span class="alert alert-danger" role="alert">
                  No IC tidak sah !
                </span>
                <br/><br/>
                @enderror
                <div class="text-center">
                  <center> {!! htmlFormSnippet() !!} </center>
                  @error('g-recaptcha-response')
                  <br/>
                  <span class="alert alert-danger" role="alert">
                    {{ $message }}
                  </span>
                  <br/><br/>
                  @enderror
                  <br/>
                  <button type="submit" class="btn btn-primary btn-round btn-lg">Hantar</button>
                </div>
              </form>
            </div>
          </div>

          <br>
            <strong><b b style="color:red">Bantuan Khas Kehilangan Pendapatan RM100 sehari kerana dikurantin/dirawat.</b></strong>
            <br />
            <br>
            <strong>FAQ - Garis Panduan Pemberian Bantuan Khas COVID-19</strong>
            <a href="http://www.nadma.gov.my/ms/bantuan/bantuan-khas-covid-19">http://www.nadma.gov.my/ms/bantuan/bantuan-khas-covid-19</a>
            <br />
            <br>
              <strong><b b style="color:red">Bantuan khas pengurusan kematian COVID-19</b></strong>
            <br />
            <br>
            <b>FAQ - Garis Panduan Pemberian Bantuan Khas Pengurusan Kematian COVID-19 </b>
            <a href="http://www.nadma.gov.my/ms/bantuan/bantuan-khas-pengurusan-kematian-covid-19">http://www.nadma.gov.my/ms/bantuan/bantuan-khas-pengurusan-kematian-covid-19</a>


          
        </div>


      </div>
      <br/><br/> <br/><br/>
    </div>
  </div>
</div>
@endsection
@section('myjs')
<script>
function onsubmit_form(){

if($("#no_ic").val().length < 14){
  alert("No IC tidak sah ! ");
  $("#no_ic").focus();
  return false;
}

if ($('input[name="jenis_bantuan"]:checked').length == 0) {
         alert('Sila pilih jenis bantuan.');
         $("#bantuan").focus();
         return false; 
       } 

// if($("#g-recaptcha-response").val()==""){
// alert("Sila tick pada ReCaptcha I'm Not A Robot ! ");
// //$("#no_ic").focus();
// return false;
// }

return true;
}
$(document).ready(function(){
@error('no_ic')
var n = $(document).height();
$('html, body').animate({ scrollTop: n }, 500);
@enderror
$('#no_ic').mask('000000-00-0000', {placeholder: "_____-__-____"});
});
</script>
@endsection