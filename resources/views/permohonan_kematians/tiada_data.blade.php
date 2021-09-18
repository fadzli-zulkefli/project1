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
                @if($errors->any())
                  <div class="alert alert-danger">
                      <p><strong>Opps Something went wrong</strong></p>
                      <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                      </ul>
                  </div>
              @endif
              <div class="text-center text-uppercase-OLD mb-4">
              {{-- Harap Maaf, Maklumat Anda Tiada Dalam Pangkalan Data --}}
              Mohon semak semula status selepas 14 hari bekerja. <br><br>
              Jika permohonan lengkap telah dihantar selepas 30 hari bekerja sila lengkapkan borang maklum balas dibawah.
              <br>
              <br>
              <form method="POST" action="{{ route('post.semakan_kematian') }}">
                @csrf
                  No KP Si Mati: 
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-credit-card"></i></span>
                    </div>
                    <input id="patient_nokp" name="patient_nokp" class="form-control" value="{{ old('patient_nokp',$_GET['no_ic']) }}" placeholder="888888888888" type="text" required="required" autocomplete="off" data-mask="000000000000" maxlength="14" >
                  </div>
                  Nama Si Mati: 
                  <input type="text" class="form-control" name="deceased_name" value="{{ old('deceased_name') }}">
                  Nama Pemohon: 
                  <input type="text" class="form-control" name="beneficiary_name" value="{{ old('beneficiary_name') }}">
                  Tarikh Permohonan dihantar: 
                  <div class="input-group date" data-provide="datepicker">
                      <input type="text" class="form-control" name="application_date" {{ old('application_date') }}>
                      <div class="input-group-addon">
                          <span class="glyphicon glyphicon-th"></span>
                      </div>
                  </div>

                  Kaedah hantar dokumen : 
                  <select class="form-select form-control" aria-label="Medium" name="post_method">
                    <option selected value="">Sila pilih</option>
                    <option value="Pos">Pos</option>
                    <option value="Emel">Emel</option>
                    <option value="Whatsapp">Whatsapp</option>
                  </select>

                  Hospital yang memaklumkan kematian: 
                  <input type="text" class="form-control" name="hospital_name" value="{{ old('hospital_name') }}">
                  No telefon pemohon: 
                  <input type="text" class="form-control" name="beneficiary_phone" value="{{ old('beneficiary_phone') }}">
                  Emel Pemohon: 
                  <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                  <br>

                  <button type="submit" class="btn btn-primary btn-round btn-lg">Hantar</button>

              </form>
              <br>

              <a href="{{ url('/') }}"  class="btn btn-primary btn-round btn-lg">Kembali Ke Laman Utama</a>
             
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

    $(document).ready(function(){


// $('#patient_nokp').mask('000000-00-0000', {placeholder: "_____-__-____"});

    });




</script>


@endsection