<?php

namespace App\Http\Controllers;

use App\DataTables\permohonanKematianDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatepermohonanKematianRequest;
use App\Http\Requests\UpdatepermohonanKematianRequest;
use App\Repositories\permohonanKematianRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class permohonanKematianController extends AppBaseController
{
    /** @var  permohonanKematianRepository */
    private $permohonanKematianRepository;

    public function __construct(permohonanKematianRepository $permohonanKematianRepo)
    {
        $this->permohonanKematianRepository = $permohonanKematianRepo;
    }

    /**
     * Display a listing of the permohonanKematian.
     *
     * @param permohonanKematianDataTable $permohonanKematianDataTable
     * @return Response
     */
    public function index(permohonanKematianDataTable $permohonanKematianDataTable)
    {
        return $permohonanKematianDataTable->render('permohonan_kematians.index');
    }

    /**
     * Show the form for creating a new permohonanKematian.
     *
     * @return Response
     */
    public function create()
    {
        return view('permohonan_kematians.create');
    }

    /**
     * Store a newly created permohonanKematian in storage.
     *
     * @param CreatepermohonanKematianRequest $request
     *
     * @return Response
     */
    public function store(CreatepermohonanKematianRequest $request)
    {
        $input = $request->all();

        $permohonanKematian = $this->permohonanKematianRepository->create($input);

        Flash::success('Permohonan Kematian saved successfully.');

        return redirect(route('permohonanKematians.index'));
    }

    /**
     * Display the specified permohonanKematian.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $permohonanKematian = $this->permohonanKematianRepository->find($id);

        if (empty($permohonanKematian)) {
            Flash::error('Permohonan Kematian not found');

            return redirect(route('permohonanKematians.index'));
        }

        return view('permohonan_kematians.show')->with('permohonanKematian', $permohonanKematian);
    }

    /**
     * Show the form for editing the specified permohonanKematian.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $permohonanKematian = $this->permohonanKematianRepository->find($id);

        if (empty($permohonanKematian)) {
            Flash::error('Permohonan Kematian not found');

            return redirect(route('permohonanKematians.index'));
        }

        return view('permohonan_kematians.edit')->with('permohonanKematian', $permohonanKematian);
    }

    /**
     * Update the specified permohonanKematian in storage.
     *
     * @param  int              $id
     * @param UpdatepermohonanKematianRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepermohonanKematianRequest $request)
    {
        $permohonanKematian = $this->permohonanKematianRepository->find($id);

        if (empty($permohonanKematian)) {
            Flash::error('Permohonan Kematian not found');

            return redirect(route('permohonanKematians.index'));
        }

        $permohonanKematian = $this->permohonanKematianRepository->update($request->all(), $id);

        Flash::success('Permohonan Kematian updated successfully.');

        return redirect(route('permohonanKematians.index'));
    }

    /**
     * Remove the specified permohonanKematian from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $permohonanKematian = $this->permohonanKematianRepository->find($id);

        if (empty($permohonanKematian)) {
            Flash::error('Permohonan Kematian not found');

            return redirect(route('permohonanKematians.index'));
        }

        $this->permohonanKematianRepository->delete($id);

        Flash::success('Permohonan Kematian deleted successfully.');

        return redirect(route('permohonanKematians.index'));
    }
}
