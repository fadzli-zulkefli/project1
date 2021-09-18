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
            {{ config('app.name') }}
          </h3>

          <h4 styleOLD="margin" class="description">

        <div class="row">
          <div class="col-md-3">

          </div>
        <div class="col-md-6">

          <ol class="text-justify">
          
          <br>
          <strong><b b style="color:red">Tarikh tutup bantuan khas ini adalah sebulan selepas PKP ditamatkan. Hanya permohonan lengkap yang diterima NADMA selewat-lewatnya sebulan selepas tarikh tutup bantuan, layak untuk dipertimbangkan</b></strong>
          <br />
          <br>
          <b>Semakan ini hanya bagi Permohonan Bantuan Khas COVID -19 NADMA sahaja. Hanya permohonan lengkap yang telah lulus setelah semakan silang dengan data KKM sahaja dipaparkan. Borang yang tidak lengkap tidak akan diproses</b>
          <br />
          <br>
          <b>Pembayaran akan dibuat terus ke akaun pemohon yang layak dan lengkap yang menggunakan bank-bank tempatan kecuali ASB dan Tabung Haji</b>
          <br />
          <br>
          <!-- <strong><b style="color:red">Bagi permohonan yang tidak lengkap, NADMA akan meminta dokumen yang diperlukan melalui talian whatsapp 016-2353954 (talian hanyalah untuk penghantaran dokumen sahaja dan tidak boleh dihubungi).</b></strong> -->
          <!-- <br />
          <br> -->

          </ol>

        </div>
        <div class="col-md-3">

          </div>
        </div>    




         <strong> Syarat-Syarat Kelayakan: </strong>

         <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-6">

            <ol class="text-justify">

<li>Warganegara Malaysia yang bekerja di Malaysia tetapi telah kehilangan sumber pendapatan atau tidak dibayar gaji sepanjang tempoh dikenakan Perintah Pengawasan Dan Pemerhatian Bagi Kontak Covid-19 Di Bawah Seksyen 15(1) Akta Pencegahan Dan Pengawalan Penyakit Berjangkit 1988 (Akta 342).</li>
<li>Warganegara Malaysia yang bekerja tetapi telah kehilangan sumber pendapatan atau tidak dibayar gaji sepanjang tempoh menjalani rawatan di wad hospital (warded) ekoran COVID-19.</li>

        </ol>

            </div>
            <div class="col-md-3">

            </div>
         </div>



          </h4>






          <h4 class="description">


         <strong> Pemohon Yang Tidak Layak: </strong>

<div class="row">
   <div class="col-md-3">

   </div>
   <div class="col-md-6">

   <ol class="text-justify">

<li>Bukan Warganegara Malaysia</li>
<li>Tiada pekerjaan sebelum dikenakan Perintah Pengawasan dan Pemerhatian.</li>
<li>Mempunyai pendapatan atau menerima gaji dalam tempoh Pengawasan dan Pemerhatian/menjalani rawatan di wad hospital (warded) ekoran COVID-19.</li>
<!-- <li>Dikenakan perintah kuarantin/menjalani rawatan selepas 31 Disember 2020.</li> -->

</ol>

   </div>
   <div class="col-md-3">

   </div>
</div>




          </h4>





          <br />







          <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="card bg-secondary shadow border-0">

            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-uppercase mb-4">
              MASUKKAN NO. KAD PENGENALAN ANDA
              </div>
              <form onsubmit="return onsubmit_form()" action="{{ url('/semakan') }}" method="POST" role="form">

              @csrf

                <div class="form-group mb-3">
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

    if($("#g-recaptcha-response").val()==""){
        alert("Sila tick pada ReCaptcha I'm Not A Robot ! ");
        //$("#no_ic").focus();
        return false;
    }
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
