<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Permohonan;
use App\Models\KategoriPermohonan;
use App\Models\JenisUpload;
use App\Models\PermohonanUpload;
use App\Models\permohonanKematian;
use Illuminate\Support\Facades\Storage;

class ImportCsvController extends Controller
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

    function csvToArray($filename = '', $delimiter = ',')
{
    if (!file_exists($filename) || !is_readable($filename))
        return false;

    $header = null;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== false)
    {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
        {
            //header
            if (!$header)
                $header = $row;
            else
                $data[] = array_combine($header, $row);
        }
        fclose($handle);
    }

    return $data;
}

public function web_import(){
    $uploadedFile = request()->file("filecsv");
    //dd($uploadedFile->getPathName());
    $this->importCsv($uploadedFile->getPathName(),true);
}


    public function importCsv($path,$webRequest=false)
    {
        $newline = ($webRequest==true)?'<br/>':'\r\n';

        $file = $path; // public_path('file/test.csv');

        $arr = $this->csvToArray($file);

        $count=0;$countImport=0;

        for ($i = 0; $i < count($arr); $i ++)
        {
            //echo  $arr[$i]['no_ic'];
            $arr[$i]['no_ic'] = trim(str_replace("-", "", $arr[$i]['no_ic']));
            $arr[$i]['jumlah_diluluskan'] = trim(str_replace(",", "", $arr[$i]['jumlah_diluluskan']));
            $arr[$i]['tarikh_permohonan'] = $arr[$i]['tarikh_permohonan'] == "" ? NULL : $arr[$i]['tarikh_permohonan'];


            if( strlen($arr[$i]['no_ic']) == 12 &&  is_numeric($arr[$i]['no_ic'])){
                $id = Permohonan::where("no_ic", $arr[$i]['no_ic'])->first();
                $already_exists="";
                if(empty($id)){
                    $p = new Permohonan();
                    $p->fill($arr[$i])->save();
                    
                    $already_exists= " - imported ! ";
                    $countImport++;
                    
                }else{
                    //REPLACE DATA
                    
                    $id->fill($arr[$i])->save();

                    //END REPLACE DATA
                    $already_exists=" - already exists - data replaced ! ";
                    
                }
                $count++;
                echo $count.")". $arr[$i]['no_ic'] ." - " . $arr[$i]['name'].$already_exists.$newline;
            }
            
        }

        echo $newline.$countImport.' Records Imported...DONE';
        return $countImport.' Records Imported... Job done';    
    }


    public function web_import_kematian(){
        $uploadedFile = request()->file("filecsv");
        //dd($uploadedFile->getPathName());
        $this->importCsvKematian($uploadedFile->getPathName(),true);
    }


    public function importCsvKematian($path,$webRequest=false)
    {
        $newline = ($webRequest==true)?'<br/>':'\r\n';

        $file = $path; // public_path('file/test.csv');

        $arr = $this->csvToArray($file);
        // dd($arr);

        $count=0;
        $countImport=0;

        $new_data = 0;
        $exist_data = 0;

        for ($i = 0; $i < count($arr); $i ++)
        {
            //echo  $arr[$i]['no_ic'];
            $arr[$i]['patient_nokp'] = trim(str_replace("-", "", $arr[$i]['patient_nokp']));
            $arr[$i]['patient_nokp'] = trim(str_replace(" ", "", $arr[$i]['patient_nokp']));
            $arr[$i]['created_userid'] = "BATCH_WEB";

            $arr[$i]['received_date'] = $arr[$i]['received_date'] == "" ? NULL : $arr[$i]['received_date'];
            $arr[$i]['patient_name'] = trim(str_replace("\xA0", "", strtoupper($arr[$i]['patient_name'])));
            $arr[$i]['beneficiary_name'] = strtoupper($arr[$i]['beneficiary_name']);

            if( strlen($arr[$i]['patient_nokp']) == 12 &&  is_numeric($arr[$i]['patient_nokp'])){
                $id = permohonanKematian::where("patient_nokp", $arr[$i]['patient_nokp'])->first();
                $already_exists="";

                if(empty($id)){
                    $p = new permohonanKematian();
                    $p->fill($arr[$i])->save();
                    
                    $new_data++;
                    $already_exists= " - imported ! ";
                    
                }else{
                    //REPLACE DATA
                    
                    $id->fill($arr[$i])->save();

                    //END REPLACE DATA
                    $already_exists=" <span style='color:red'>- already exists - data replaced ! </span>";
                    $exist_data++;
                    
                }

                $count++;
                echo $count.") ". $arr[$i]['patient_nokp'] ." - " . $arr[$i]['patient_name'].$already_exists.$newline;
            }
            
        }

        echo "<br>";
        echo $count.' Records Imported... Job done';    
        echo "<br>";
        echo "<br>";
        echo "New data Inrserted: ".$new_data;
        echo "<br>";
        echo "Existing data updated: ".$exist_data;
    }

}
