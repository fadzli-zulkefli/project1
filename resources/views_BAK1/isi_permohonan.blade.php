@extends('layouts.public')

@section('content')


<br/><br/> <br/><br/> <br/><br/>

<form onsubmit="return onsubmit_form()" action="{{ url('permohonan') }}" enctype="multipart/form-data" method="POST">

<input type="hidden" name="pid" value="{{ $permohonan->id }}" />
@csrf

<div class="content-center text-center">
      <div class="col-md-12 ml-auto mr-auto">
        <div class="brand">

        <img style="height: 140px;" src="{{ asset('/') }}img/nadma_logo.png">

          <h3 class="title">
            {{ config('app.name') }}
          </h3>

          <p>
              Nama : {{ $permohonan->name }}<br/>
              No IC : {{ $permohonan->no_ic }}
          </p>



          <p>SILA PILIH KATEGORI ANDA:</p>


          <div class="row"> {{-- START DIV ROW --}}
            <div class="col-md-3">

            </div>
            <div class="col-md-6 text-justify">

          @foreach($kategoriPermohonan as $k)

          <div class="custom-control custom-radio mb-3">
            <input required onchange="onchange_kategori();" name="kategori" value="{{ $k->id }}" class="custom-control-input" id="kategori{{ $k->id }}" type="radio">
             <label class="custom-control-label" for="kategori{{ $k->id }}"> {{ $k->name }} </label>
            </div>

          @endforeach

          </div>
          <div class="col-md-3">

            </div>
        </div> {{-- END DIV ROW --}}


<div style="display:none;" id="divPermohonan">
    <br/>
    <p>SILA UPLOAD SALINAN DOKUMEN BERIKUT:</p>

        <div class="row"> {{-- START DIV ROW --}}
            <div class="col-md-1">



            </div>
            <div class="col-md-10 text-justify">


            <table id="tableUploadPermohonan" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th>Dokumen</th>
            <th style="width:30%;">Upload</th>

        </tr>
    </thead>
    <tbody>

    </tbody>
    </table>



          </div>
          <div class="col-md-1">

            </div>
        </div> {{-- END DIV ROW --}}

        <div class="row text-center">
            <div class="col-md-12 text-center">
                <p>SILA ISI MAKLUMAT BERIKUT:</p>
            </div>

        </div>


        <div class="row"> {{-- START DIV ROW --}}



            <div class="col-md-3">



            </div>
            <div class="col-md-6 text-justify">




                <div class="form-group">
                    <label class="form-label">
                        <span style="color:red;"><strong> * </strong></span>
                        {{ __('E-Mail :') }}</label>

                        <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                            </div>

                            <input  id="email" type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">

                          </div>




                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <span style="color:red;"><strong> * </strong></span>
                        No Telefon : </label>


                        <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                            </div>

                            <input  id="MobileNo" type="text"
                        class="form-control @error('no_tel') is-invalid @enderror"
                        name="no_tel" value="{{ old('no_tel','60') }}" required
                        data-mask="000-00000000000">

                          </div>



                    @error('no_tel')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label class="form-label">

                        No Akaun Bank : </label>


                        <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-credit-card"></i></span>
                            </div>

                            <input  id="no_akaun" type="text"
                        class="form-control @error('no_akaun') is-invalid @enderror"
                        name="no_akaun" value="{{ old('no_akaun','') }}"
                        >

                          </div>



                    @error('no_akaun')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>



                <div class="form-group">
                    <label class="form-label">

                        Nama Bank : </label>


                        <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-building"></i></span>
                            </div>

                            <input  id="nama_bank" type="text"
                        class="form-control @error('nama_bank') is-invalid @enderror"
                        name="nama_bank" value="{{ old('nama_bank','') }}"
                        >

                          </div>



                    @error('nama_bank')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>





            </div>
            <div class="col-md-3">



            </div>


        </div> {{-- END DIV ROW --}}

    </div>








        <a href="{{ url('/') }}"  class="btn btn-danger btn-round btn-lg">Kembali</a>

        <button type="submit"  class="btn btn-primary btn-round btn-lg">Hantar</button>




{{--

          <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="card bg-secondary shadow border-0">

            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-uppercase mb-4">

              </div>



            </div>
          </div>




        </div>
      </div>
--}}








          <br/><br/> <br/><br/>
        </div>


      </div>
    </div>


    </form>

@endsection


@section('myjs')


<script>

    function onsubmit_form(){

        var file6 = $("#jenis_upload_id_6").val();
        var file7 = $("#jenis_upload_id_7").val();
        if(file6=="" && file7 == ""){
            alert("Sila Upload Salinan penyata bank / muka depan buku akaun atau Surat Perwakilan Kuasa Kepada Waris (jika tiada akaun bank)");
            $("#jenis_upload_id_6").focus();
            return false;
        }

        if(file6 != "" ){
            if($("#no_akaun").val()==""){
                alert("Sila masukkan No Akaun Bank !");
                $("#no_akaun").focus();
                return false;
            }

            if($("#nama_bank").val()==""){
                alert("Sila masukkan Nama Bank !");
                $("#nama_bank").focus();
                return false;
            }
        }

    }

var jenisUpload=@json($jenisUpload);

function onchangeFileInputVal(elm){
        var val=$(elm).val();
        var index=val.lastIndexOf("\\");
        if(index!=-1){
            val=val.substring(index+1);
        }
        $(elm).parent().find("#doc_file_label").html('<span style="font-size:11px;line-height:0;">'+val+'</span>');

    }

function onchange_kategori(){
    var val_kategori = $("[name=kategori]:checked").val();
    $("#divPermohonan").show();

    // console.log(val_kategori);

    var countNo = 0;
    var htmlTblBody="";

    for(var i=0;i<jenisUpload.length;i++){
        var j = jenisUpload[i];
        if(j['kategori_'+val_kategori] == 1){
            countNo++;
            var strMuatTurun = "";
            if(j['template_file']!=null && j['template_file']!="" ){
                strMuatTurun = '&nbsp; <strong><a download style="color:red;" href="{{ url("/") }}'+
                j['template_file']+
                '">(muat turun di sini)</a></strong>';
            }

            var strWajib=""; var strRequired="";
            if(j['kategori_'+val_kategori+'_wajib'] == 1){
                strWajib='<span style="color:red;"><strong> * </strong></span>';
                if(j['name'].indexOf("bank") == -1){
                    strRequired="required ";
                }
            }

            var inputUpload='<div class="custom-file">'+
                    '<input type="file" class="custom-file-input" '+
                    'accept=".gif,.jpg,.jpeg,.png,.doc,.docx,.pdf" '+
                    strRequired +
                    'onchange="onchangeFileInputVal(this)" '+
                    'name="jenis_upload_id['+j['id']+']" id="jenis_upload_id_'+j['id']+'" lang="en">'+
                    '<label id="doc_file_label" class="custom-file-label"  '+
                    'for="jenis_upload_id_'+j['id']+'"></label>'+
                  '</div>';

            htmlTblBody+=

            '<tr>' +
            '<td>'+countNo+'</td>'+
            '<td>'+strWajib+j['name']+strMuatTurun+'</td>'+
            '<td>'+inputUpload+'</td>'+
            '</tr>';
        }
    }

    $("#tableUploadPermohonan tbody").html(htmlTblBody);


}

    $(document).ready(function(){




    });




</script>


@endsection
