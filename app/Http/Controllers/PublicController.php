<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Permohonan;

use App\Models\KategoriPermohonan;
use App\Models\JenisUpload;
use App\Models\PermohonanUpload;
use Illuminate\Support\Facades\Storage;
use Flash;

use App\Models\LogSemakan;
use App\Models\permohonanKematian;
use Carbon\Carbon;
use Mail;

class PublicController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function welcome()
    {
        return view('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function semakan(Request $request)
    {
        request()->validate([
            'g-recaptcha-response' => 'required|recaptcha',
            'no_ic' => 'required|string|min:14|max:14|unique:permohonan',
        ]);
        
        $ic = request()->get("no_ic");
        $ic = str_replace("-", "", $ic);

        if ($request->jenis_bantuan == 'bantuan') {


            $log = new LogSemakan();
            $log->no_ic = $ic;
            $log->ip =  request()->ip();
            $log->save();

            $permohonan = Permohonan::where("no_ic", $ic)->first();
            $JenisUpload = JenisUpload::pluck('name', 'id')->toArray();

            if (empty($permohonan)) {

        //  Flash::error('Tiada maklumat');
        //  return redirect(route('public_home'));

                return view('tiada_data', compact('ic'));
            } else {

                return view('notify_permohonan_done', compact('permohonan','JenisUpload'));

                /*
                if (!empty($permohonan->tarikh_permohonan)) {
                    return view('notify_permohonan_done', compact('permohonan'));
                }
                $kategoriPermohonan = KategoriPermohonan::all();
                $jenisUpload = JenisUpload::orderBy('item_order')->get();

                return view('isi_permohonan', compact('permohonan', 'kategoriPermohonan', 'jenisUpload'));
                */
            }
        }

        if ($request->jenis_bantuan == 'bantuan_kematian') {

            $permohonan = permohonanKematian::where("patient_nokp", $ic)->first();
            if (empty($permohonan)) {
                //  Flash::error('Tiada maklumat');
                 //  return redirect(route('public_home'));
                return view('permohonan_kematians.tiada_data', compact('ic'));
            } else {
                return view('permohonan_kematians.notify_permohonan_done', compact('permohonan'));
            }
        }

        Flash::error('Sila Pilih Jenis Bantuan');
        return redirect(route('public_home'));
    }

    public function permohonanKematian(Request $request)
    {
        //add created_date in request
        $request->request->add(['created_date'=>now()]);
        // dd($request->all());
        $request->validate([
            'patient_nokp' => 'required|string|min:12|max:12|unique:permohonan_kematians',
            'deceased_name' =>  'required',
            'beneficiary_name'    =>  'required',
            'application_date'  =>  'required',
            'hospital_name' =>  'required',
            'beneficiary_phone'   =>  'required|min:10|max:16',
            'email' =>  'required|email',
            'post_method'   =>  'required'
        ]);

         $permohonanKematian = permohonanKematian::create([
            'patient_nokp' => str_replace("-", "", $request->patient_nokp ),
            'patient_name' => $request->deceased_name,
            'beneficiary_name'    => $request->beneficiary_name,
            'application_date'  => Carbon::createFromFormat('m/d/Y', $request->application_date)->format('Y-m-d H:i:s'),
            'hospital_name' => $request->hospital_name,
            'beneficiary_phone'   => $request->beneficiary_phone,
            'email' => $request->email,
            'post_method'   => $request->post_method,
            'status_code'   => 3,
            'created_date'  => $request->created_date,// received_date?
        ]);

        $subject_email = 'Kuiri Bantuan Khas Pengurusan Kematian - '. $request->patient_nokp;

        Mail::send(['text'=>'permohonan_kematians.email'], ['data'=>$request], function($message) use ($request,$subject_email) {
             $message->to('bk2covid19@nadma.gov.my', $request->beneficiary_name)
                     ->subject( $subject_email)
                     ->cc($request->email, $request->beneficiary_name);
             $message->from('bk2covid19@nadma.gov.my','Semakan kematian Bantuan Khas Pengurusan Kematian Covid 19');
          });

         if ($permohonanKematian) {
            Flash::error('Kuiri telah berjaya dihantar');
            return redirect(route('public_home'));
         }



    }


    public function semakanBantuan(Request $request)
    {
        // dd($request->all());
        //add created_date in request
        $request->request->add(['created_date'=>now()]);
        $request->validate([
            'no_ic' => 'required|string|min:12|max:12|unique:permohonan',
            'name' =>  'required',
            'application_date'  =>  'required',
            'post_method'   =>  'required',
            'hospital_name' =>  'required',
            'no_tel'   =>  'required|min:10|max:16',
            'email' =>  'required|email',
        ]);

         $permohonan = Permohonan::create([
            'no_ic' => str_replace("-", "", $request->no_ic ),
            'name' => $request->name,
            'tarikh_hantar'  => Carbon::createFromFormat('m/d/Y', $request->application_date)->format('Y-m-d H:i:s'),
            'post_method'   => $request->post_method,
            'hospital_name' => $request->hospital_name,
            'no_tel'   => $request->beneficiary_phone,
            'email' => $request->email,
            'status'   => 3,
            // 'created_date'  => $request->created_date,// received_date?
        ]);

        $subject_email = 'Kuiri Bantuan Khas Covid 19 NADMA - '. $request->patient_nokp;

        Mail::send(['text'=>'pemohon.email'], ['data'=>$request], function($message) use ($request,$subject_email) {
             $message->to('bk2covid19@nadma.gov.my', $request->beneficiary_name)
                     ->subject( $subject_email)
                     ->cc($request->email, $request->beneficiary_name);
             $message->from('bk2covid19@nadma.gov.my','Semakan Bantuan Khas Covid 19');
          });

         if ($permohonan) {
            Flash::error('Kuiri telah berjaya dihantar');
            return redirect(route('public_home'));
         }



    }



    public function permohonan()
    {
        // dd()

        $rules = [
            // 'no_ic' => 'required|string|min:14|max:14|unique:permohonan',
            'kategori' => 'required',
            'email' => 'required|email|max:170',
            'no_tel' => 'required|min:10|max:16',
            // file = nullable 'mimes:pdf,jpeg,png,jpg,gif,svg,doc,docx', 'max:20224'] //20MB max

        ];

        $jenis_upload = JenisUpload::all();
        foreach ($jenis_upload as $j) {
            $rules["jenis_upload_id.{$j->id}"] = ['nullable', 'mimes:pdf,jpeg,png,jpg,gif,svg,doc,docx,zip', 'max:20224']; //20MB max
        }


        request()->validate($rules);

        $permohonanId = request()->get("pid");
        $permohonan = Permohonan::findOrFail($permohonanId);

        $permohonan->fill(request()->all());

        $permohonan->tarikh_permohonan = now();

        $permohonan->save();

        $jenis_upload_id = request()->file("jenis_upload_id");
        foreach ($jenis_upload_id as $i => $v) {
            //echo $i . " => " . $v . "<br/>";
            if (request()->hasFile("jenis_upload_id.$i")) {
                //echo "hasFile";

                $uploadedFile = request()->file("jenis_upload_id.$i");
                $ext = $uploadedFile->getClientOriginalExtension();
                $filename = "permohonan_id_" . $permohonan->id . "_jenis_upload_id_" . $i . "_timestamp_" . time() . "." . $ext;  //time() . $uploadedFile->getClientOriginalName();

                Storage::disk('local')->putFileAs(
                    'upload/',
                    $uploadedFile,
                    $filename

                );

                $permohonanUpload = new PermohonanUpload();
                /*
                    'permohonan_id',
        'jenis_upload_id',
        'file_path'
                */
                $permohonanUpload->permohonan_id = $permohonan->id;
                $permohonanUpload->jenis_upload_id = $i;
                $permohonanUpload->file_path = $filename;
                $permohonanUpload->created_at = $permohonan->tarikh_permohonan;
                $permohonanUpload->save();
            }
        }

        //die();
        return view('done_hantar_permohonan');
    }
}
