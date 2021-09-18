<?php

namespace App\Http\Controllers;

use App\DataTables\PemohonDataTable;
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

class PemohonController extends AppBaseController
{
    /** @var  PermohonanRepository */
    private $permohonanRepository;

    private $additional_data;

    public function __construct(PermohonanRepository $permohonanRepo)
    {
        $this->permohonanRepository = $permohonanRepo;

        $statusList = StatusList::pluck('name', 'value')->toArray();

        $this->additional_data = compact('statusList');
    }

    /**
     * Display a listing of the Permohonan.
     *
     * @param PermohonanDataTable $permohonanDataTable
     * @return Response
     */
    public function index(PemohonDataTable $permohonanDataTable)
    {

        return $permohonanDataTable->render('pemohon.index', $this->additional_data);
    }

    /**
     * Show the form for creating a new Permohonan.
     *
     * @return Response
     */
    public function create()
    {
        return view('pemohon.create');
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

        return redirect(route('pemohon.index'));
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
            Flash::error('Not found');

            return redirect(route('pemohon.index'));
        }

        $PermohonanUpload = PermohonanUpload::where("permohonan_id", "=", $permohonan->id)->orderBy('id', 'desc')->get();
        $JenisUpload = JenisUpload::pluck('name', 'id')->toArray();

        $latest_batch = isset($PermohonanUpload[0])? $PermohonanUpload[0] : null ;

        //dd($latest_batch);

        $statusList =  $this->additional_data['statusList'];

        return view('pemohon.show')->with(compact('permohonan', 'PermohonanUpload', 
        'JenisUpload', 'latest_batch','statusList'));  // 'permohonan', $permohonan);
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

            return redirect(route('pemohon.index'));
        }

        return view('pemohon.edit')->with('permohonan', $permohonan);
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

            return redirect(route('pemohon.index'));
        }

        $permohonan = $this->permohonanRepository->update($request->all(), $id);

        Flash::success('Permohonan updated successfully.');

        return redirect(route('pemohon.index'));
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

            return redirect(route('pemohon.index'));
        }

        $this->permohonanRepository->delete($id);

        Flash::success('Permohonan deleted successfully.');

        return redirect(route('pemohon.index'));
    }
}
