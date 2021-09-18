<?php

namespace App\Http\Controllers;

use App\DataTables\PermohonanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePermohonanRequest;
use App\Http\Requests\UpdatePermohonanRequest;
use App\Repositories\PermohonanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use App\Models\PermohonanUpload;
use App\Models\JenisUpload;
use App\Models\StatusList;
use App\Models\KategoriPermohonan;

use App\Notifications\EmelMaklumPemohon;

use Notification;

class PermohonanController extends AppBaseController
{
    /** @var  PermohonanRepository */
    private $permohonanRepository;

    private $additional_data;

    public function __construct(PermohonanRepository $permohonanRepo)
    {
        $this->permohonanRepository = $permohonanRepo;

        $statusList = StatusList::pluck('name', 'value')->toArray();
        $kategoriList = KategoriPermohonan::pluck('name', 'id')->toArray();

        $this->additional_data = compact('statusList','kategoriList');
    }

    /**
     * Display a listing of the Permohonan.
     *
     * @param PermohonanDataTable $permohonanDataTable
     * @return Response
     */
    public function index(PermohonanDataTable $permohonanDataTable)
    {

        return $permohonanDataTable->render('permohonans.index', $this->additional_data);
    }

    /**
     * Show the form for creating a new Permohonan.
     *
     * @return Response
     */
    public function create()
    {
        return view('permohonans.create');
    }

    /**
     * Store a newly created Permohonan in storage.
     *
     * @param CreatePermohonanRequest $request
     *
     * @return Response
     */
    public function store(CreatePermohonanRequest $request)
    {
        $input = $request->all();

        $permohonan = $this->permohonanRepository->create($input);

        Flash::success('Permohonan saved successfully.');

        return redirect(route('permohonans.index'));
    }

    /**
     * Display the specified Permohonan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $permohonan = $this->permohonanRepository->find($id);



        if (empty($permohonan)) {
            Flash::error('Permohonan not found');

            return redirect(route('permohonans.index'));
        }

        $PermohonanUpload = PermohonanUpload::where("permohonan_id", "=", $permohonan->id)->orderBy('id', 'desc')->get();
        $JenisUpload = JenisUpload::pluck('name', 'id')->toArray();

        $latest_batch = isset($PermohonanUpload[0])? $PermohonanUpload[0] : null ;

        $PermohonanAssoc=[];

        foreach($PermohonanUpload as $p){
                    if(!is_null($latest_batch) && $latest_batch->created_at == $p->created_at){

                        //$p->file_path
                        $PermohonanAssoc[ $p->jenis_upload_id ] = $p->file_path;

                    }
        }



        //dd($latest_batch);

        $statusList =  $this->additional_data['statusList'];
        $kategoriList = $this->additional_data['kategoriList'];

        $status_alert_class = "alert-info"; //alert-success
        $display_kuiri = "none";
        switch($permohonan->status){
            case 1: $status_alert_class = "alert-success"; 
                    $display_kuiri = "none";
                break;

            case -1: $status_alert_class = "alert-danger"; 
                    $display_kuiri = "none";
                break;

            case 2: $status_alert_class = "alert-warning"; 
            $display_kuiri = "block";
                break;

        }

        $tblUpload = [];//"";
        if($permohonan->kategori==1){
            $tblUpload = JenisUpload::where("kategori_1",1)->orderBy('item_order')->get();
        }elseif($permohonan->kategori==2){
            $tblUpload = JenisUpload::where("kategori_2",1)->orderBy('item_order')->get();
        }

        $statusListFull = StatusList::all();

        return view('permohonans.show')->with(compact('permohonan', 'PermohonanUpload', 
        'JenisUpload', 'latest_batch','statusList','statusListFull','kategoriList',
        'status_alert_class','tblUpload','PermohonanAssoc','display_kuiri'));  // 'permohonan', $permohonan);
    }

    /**
     * Show the form for editing the specified Permohonan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $permohonan = $this->permohonanRepository->find($id);

        if (empty($permohonan)) {
            Flash::error('Permohonan not found');

            return redirect(route('permohonans.index'));
        }

        return view('permohonans.edit')->with('permohonan', $permohonan);
    }

    /**
     * Update the specified Permohonan in storage.
     *
     * @param  int              $id
     * @param UpdatePermohonanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePermohonanRequest $request)
    {
        $permohonan = $this->permohonanRepository->find($id);

        if (empty($permohonan)) {
            Flash::error('Permohonan not found');

            return redirect(route('permohonans.index'));
        }

        //dd($request->all());

        $JenisUpload = JenisUpload::pluck('name', 'id')->toArray();

        $kuiri_fields=[];

        $allRequest = $request->all();
        $kuiri_txt_emel = "<p><ol>";

        if($allRequest['status']=="2"){
            if(isset($allRequest['chkbox_kuiri']) && is_array($allRequest['chkbox_kuiri']) ){
                foreach($allRequest['chkbox_kuiri'] as $i => $v){

                    if($v == "yes"){
                        $kuiri_fields[] = $i;
                        $kuiri_txt_emel .= ("<li style='color:red;font-weight:bold;'>".
                                    strtoupper($JenisUpload[$i])."</li>");
                    }

                }
            }

            $kuiri_txt_emel .= "</ol></p>";

            $allRequest['kuiri_fields'] = json_encode($kuiri_fields);

        }else{
            $allRequest['kuiri_fields'] = json_encode([]);
        }

        $userId = auth()->user()->id;

        //$greeting_emel = "SALA,";

        $detail_pemohon = "NAMA PEMOHON : ".strtoupper($permohonan->name);

        $msg_emel = "";

        if($allRequest['status']=="2"){ //kuiri
            $msg_emel = "PERMOHONAN ANDA DIDAPATI <b>TIDAK LENGKAP</b>. SILA EMELKAN DOKUMEN BERIKUT KE EMEL bkcovid19@nadma.gov.my<br/>". 
                        $kuiri_txt_emel;
            

        }elseif($allRequest['status']=="1"){//approve

            $msg_emel = "PERMOHONAN ANDA TELAH <b>DILULUSKAN</b>. PEMBAYARAN BANTUAN KHAS COVID19 AKAN DIMASUKKAN KE DALAM AKAUN BANK YANG DINYATAKAN DALAM TEMPOH 30HARI BEKERJA.";

        }elseif($allRequest['status']=="-1"){//reject

            $msg_emel = "DUKACITA DIMAKLUMKAN BAHAWA PERMOHONAN ANDA <b>TIDAK DILULUSKAN</b>. JIKA ANDA ADA PERTANYAAN, SILA EMELKAN KE bkcovid19@nadma.gov.my";

        }

        $nota_emel = "";

        if(!empty($allRequest['komen'])){
            $nota_emel = "NOTA : ".strtoupper($allRequest['komen']);
        }

        $EmelMaklumPemohon = new EmelMaklumPemohon(compact('msg_emel','detail_pemohon','nota_emel'));

        //Auth::user()->notify($SubmittedEmail);

        //https://laravel.com/docs/5.6/notifications#on-demand-notifications

        Notification::route('mail', $permohonan->email)
            
            ->notify($EmelMaklumPemohon);



        $allRequest['updated_by'] = $userId;

        $permohonan = $this->permohonanRepository->update(
            $allRequest,  
            
            $id);

        Flash::success('Permohonan updated successfully.');

        return redirect(route('permohonans.index'));
    }

    /**
     * Remove the specified Permohonan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $permohonan = $this->permohonanRepository->find($id);

        if (empty($permohonan)) {
            Flash::error('Permohonan not found');

            return redirect(route('permohonans.index'));
        }

        $this->permohonanRepository->delete($id);

        Flash::success('Permohonan deleted successfully.');

        return redirect(route('permohonans.index'));
    }
}
