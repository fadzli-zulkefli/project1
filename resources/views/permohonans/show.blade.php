@extends('layouts.app')

@section('content')

    <section style="padding-top:20px;margin-bottom:20px;" class="content-header">
        <h1 style="float:left;" class="pull-left">
            Permohonan : {{ $permohonan->name }}
        </h1>

        <h1 style="" style="float:right;" class="pull-right">
        <span class="alert {{ $status_alert_class }}">
            Status Permohonan : {{ $statusList[$permohonan->status] }}
            </span>
        </h1>
    </section>
    <br/>
    <div class="content">
    @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">

                {!! Form::model($permohonan, ['route' => ['permohonans.update', $permohonan->id], 'method' => 'patch']) !!}


                    @include('permohonans.show_fields')

                    <br/>

                        <div class="form-group col-sm-12">
                            <label for="status">Set Status Permohonan:</label>

                            <select onchange="onchange_status(this);" name="status" id="status" class="form-control">

                            @foreach($statusListFull as $stf)

                            <option {{ ($permohonan->status==$stf->value)?"selected":"" }}
                            value="{{ $stf->value }}" >{{ $stf->detail }}</option>

                            {{--
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="status_{{ $stf->id }}" value="{{ $stf->value }}" name="status"
                                    {{ ($permohonan->status==$stf->value)?"checked ":"" }}
                                    class="custom-control-input">
                                    <label class="custom-control-label" for="status_{{ $stf->id }}">{{ $stf->detail }}</label>
                                </div>
                            --}}

                            @endforeach

                            </select>

                        </div>

                        <div style="display: {{ ($permohonan->status==1)?'block':'none' }};" id="div_jumlah_diluluskan" class="form-group col-sm-12">
                            <label for="status">Jumlah Bantuan Yang Diluluskan (RM):</label>
                            <input type="number" value="{{ $permohonan->jumlah_diluluskan }}" class="form-control" name="jumlah_diluluskan" id="jumlah_diluluskan">

                        </div>


                    <table style="display: {{ ($permohonan->status==2)?'block':'none' }};"
                        id="tableUploadPermohonan" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th>Dokumen</th>
            {{-- <th style="width:15%;">Download</th> --}}
            <th id="th_kuiri" style="width:10%;display:{{ $display_kuiri }};">Kuiri</th>

        </tr>
    </thead>
    <tbody>
                    @php
                        $count=1;
                    @endphp
                    @foreach($tblUpload as $tt)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $tt->name }}</td>

                        {{--
                        <td>
                        @if( isset($PermohonanAssoc[ $tt->id ]) )

                        <a target="_blank" href="{{ url('/get_file')."/".$PermohonanAssoc[ $tt->id ] }}">Download</a>

                        @endif

                        </td>
                        --}}


                        <td class="td_kuiri" style="display:{{ $display_kuiri }};">


                                    <input type="checkbox" id="chkbox_kuiri_{{ $tt->id }}"
                                    name="chkbox_kuiri[{{ $tt->id }}]"
                                    value="yes" aria-label="..." />



                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                    </table>


            {{--
                    @foreach($PermohonanUpload as $p)
                    @if($latest_batch->created_at == $p->created_at)
                        Dokumen : {{ $JenisUpload[$p->jenis_upload_id] }}<br/>
                        File : <a target="_blank" href="{{ url('/get_file')."/".$p->file_path }}">View</a><br/>
                        Uploaded At : {{ $p->created_at }}<br/><br/>
                    @endif
                    @endforeach
                --}}
                    <br/>


                    <div class="form-group col-sm-12">

                    <label for="komen">Komen Tambahan ( akan dihantar bersama dalam emel kepada pemohon )</label>
                    <textarea id="komen" name="komen" class="form-control" rows="3">{{ $permohonan->komen }}</textarea>

                    <label for="note">Nota Urusetia ( utk kegunaan dalaman )</label>
                    <textarea id="note" name="note" class="form-control" rows="3">{{ $permohonan->note }}</textarea>

                    </div>

                    <br/>

                    <!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    &nbsp; &nbsp;
    <a href="{{ route('permohonans.index') }}" class="btn btn-default">Go Back</a>
</div>




                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>

var kuiri_fields_checked =  {!! empty($permohonan->kuiri_fields)? "[]":$permohonan->kuiri_fields !!} ;

$(function() {
  // Handler for .ready() called.
  if(kuiri_fields_checked != null){

      for(var i=0;i<kuiri_fields_checked.length;i++){
          $("#chkbox_kuiri_"+ kuiri_fields_checked[i]).attr("checked",true);
      }

  }
});

function onchange_status(elem){
    if($(elem).val()==2 || $(elem).val()=='2'){ // kuiri
        $("#th_kuiri").show();
        $(".td_kuiri").show();

        $("#tableUploadPermohonan").show();

    }else{
        $("#th_kuiri").hide();
        $(".td_kuiri").hide();

        $("#tableUploadPermohonan").hide();
    }

    //show div_jumlah_diluluskan jika lulus ( 1 )

    if($(elem).val()==1 || $(elem).val()=='1'){ // Lulus
        $("#div_jumlah_diluluskan").show();


    }else{
        $("#div_jumlah_diluluskan").hide();

    }

}

</script>
@endpush
