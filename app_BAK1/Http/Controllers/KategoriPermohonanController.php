<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriPermohonanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateKategoriPermohonanRequest;
use App\Http\Requests\UpdateKategoriPermohonanRequest;
use App\Repositories\KategoriPermohonanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class KategoriPermohonanController extends AppBaseController
{
    /** @var  KategoriPermohonanRepository */
    private $kategoriPermohonanRepository;

    public function __construct(KategoriPermohonanRepository $kategoriPermohonanRepo)
    {
        $this->kategoriPermohonanRepository = $kategoriPermohonanRepo;
    }

    /**
     * Display a listing of the KategoriPermohonan.
     *
     * @param KategoriPermohonanDataTable $kategoriPermohonanDataTable
     * @return Response
     */
    public function index(KategoriPermohonanDataTable $kategoriPermohonanDataTable)
    {
        return $kategoriPermohonanDataTable->render('kategori_permohonans.index');
    }

    /**
     * Show the form for creating a new KategoriPermohonan.
     *
     * @return Response
     */
    public function create()
    {
        return view('kategori_permohonans.create');
    }

    /**
     * Store a newly created KategoriPermohonan in storage.
     *
     * @param CreateKategoriPermohonanRequest $request
     *
     * @return Response
     */
    public function store(CreateKategoriPermohonanRequest $request)
    {
        $input = $request->all();

        $kategoriPermohonan = $this->kategoriPermohonanRepository->create($input);

        Flash::success('Kategori Permohonan saved successfully.');

        return redirect(route('kategoriPermohonans.index'));
    }

    /**
     * Display the specified KategoriPermohonan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kategoriPermohonan = $this->kategoriPermohonanRepository->find($id);

        if (empty($kategoriPermohonan)) {
            Flash::error('Kategori Permohonan not found');

            return redirect(route('kategoriPermohonans.index'));
        }

        return view('kategori_permohonans.show')->with('kategoriPermohonan', $kategoriPermohonan);
    }

    /**
     * Show the form for editing the specified KategoriPermohonan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kategoriPermohonan = $this->kategoriPermohonanRepository->find($id);

        if (empty($kategoriPermohonan)) {
            Flash::error('Kategori Permohonan not found');

            return redirect(route('kategoriPermohonans.index'));
        }

        return view('kategori_permohonans.edit')->with('kategoriPermohonan', $kategoriPermohonan);
    }

    /**
     * Update the specified KategoriPermohonan in storage.
     *
     * @param  int              $id
     * @param UpdateKategoriPermohonanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKategoriPermohonanRequest $request)
    {
        $kategoriPermohonan = $this->kategoriPermohonanRepository->find($id);

        if (empty($kategoriPermohonan)) {
            Flash::error('Kategori Permohonan not found');

            return redirect(route('kategoriPermohonans.index'));
        }

        $kategoriPermohonan = $this->kategoriPermohonanRepository->update($request->all(), $id);

        Flash::success('Kategori Permohonan updated successfully.');

        return redirect(route('kategoriPermohonans.index'));
    }

    /**
     * Remove the specified KategoriPermohonan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kategoriPermohonan = $this->kategoriPermohonanRepository->find($id);

        if (empty($kategoriPermohonan)) {
            Flash::error('Kategori Permohonan not found');

            return redirect(route('kategoriPermohonans.index'));
        }

        $this->kategoriPermohonanRepository->delete($id);

        Flash::success('Kategori Permohonan deleted successfully.');

        return redirect(route('kategoriPermohonans.index'));
    }
}
