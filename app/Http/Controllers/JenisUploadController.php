<?php

namespace App\Http\Controllers;

use App\DataTables\JenisUploadDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateJenisUploadRequest;
use App\Http\Requests\UpdateJenisUploadRequest;
use App\Repositories\JenisUploadRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class JenisUploadController extends AppBaseController
{
    /** @var  JenisUploadRepository */
    private $jenisUploadRepository;

    public function __construct(JenisUploadRepository $jenisUploadRepo)
    {
        $this->jenisUploadRepository = $jenisUploadRepo;
    }

    /**
     * Display a listing of the JenisUpload.
     *
     * @param JenisUploadDataTable $jenisUploadDataTable
     * @return Response
     */
    public function index(JenisUploadDataTable $jenisUploadDataTable)
    {
        return $jenisUploadDataTable->render('jenis_uploads.index');
    }

    /**
     * Show the form for creating a new JenisUpload.
     *
     * @return Response
     */
    public function create()
    {
        return view('jenis_uploads.create');
    }

    /**
     * Store a newly created JenisUpload in storage.
     *
     * @param CreateJenisUploadRequest $request
     *
     * @return Response
     */
    public function store(CreateJenisUploadRequest $request)
    {
        $input = $request->all();

        $jenisUpload = $this->jenisUploadRepository->create($input);

        Flash::success('Jenis Upload saved successfully.');

        return redirect(route('jenisUploads.index'));
    }

    /**
     * Display the specified JenisUpload.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jenisUpload = $this->jenisUploadRepository->find($id);

        if (empty($jenisUpload)) {
            Flash::error('Jenis Upload not found');

            return redirect(route('jenisUploads.index'));
        }

        return view('jenis_uploads.show')->with('jenisUpload', $jenisUpload);
    }

    /**
     * Show the form for editing the specified JenisUpload.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jenisUpload = $this->jenisUploadRepository->find($id);

        if (empty($jenisUpload)) {
            Flash::error('Jenis Upload not found');

            return redirect(route('jenisUploads.index'));
        }

        return view('jenis_uploads.edit')->with('jenisUpload', $jenisUpload);
    }

    /**
     * Update the specified JenisUpload in storage.
     *
     * @param  int              $id
     * @param UpdateJenisUploadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJenisUploadRequest $request)
    {
        $jenisUpload = $this->jenisUploadRepository->find($id);

        if (empty($jenisUpload)) {
            Flash::error('Jenis Upload not found');

            return redirect(route('jenisUploads.index'));
        }

        $jenisUpload = $this->jenisUploadRepository->update($request->all(), $id);

        Flash::success('Jenis Upload updated successfully.');

        return redirect(route('jenisUploads.index'));
    }

    /**
     * Remove the specified JenisUpload from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jenisUpload = $this->jenisUploadRepository->find($id);

        if (empty($jenisUpload)) {
            Flash::error('Jenis Upload not found');

            return redirect(route('jenisUploads.index'));
        }

        $this->jenisUploadRepository->delete($id);

        Flash::success('Jenis Upload deleted successfully.');

        return redirect(route('jenisUploads.index'));
    }
}
