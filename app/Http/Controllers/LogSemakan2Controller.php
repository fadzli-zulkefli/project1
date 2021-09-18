<?php

namespace App\Http\Controllers;

use App\DataTables\LogSemakan2DataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLogSemakan2Request;
use App\Http\Requests\UpdateLogSemakan2Request;
use App\Repositories\LogSemakan2Repository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LogSemakan2Controller extends AppBaseController
{
    /** @var  LogSemakan2Repository */
    private $logSemakan2Repository;

    public function __construct(LogSemakan2Repository $logSemakan2Repo)
    {
        $this->logSemakan2Repository = $logSemakan2Repo;
    }

    /**
     * Display a listing of the LogSemakan2.
     *
     * @param LogSemakan2DataTable $logSemakan2DataTable
     * @return Response
     */
    public function index(LogSemakan2DataTable $logSemakan2DataTable)
    {
        return $logSemakan2DataTable->render('log_semakan2s.index');
    }

    /**
     * Show the form for creating a new LogSemakan2.
     *
     * @return Response
     */
    public function create()
    {
        return view('log_semakan2s.create');
    }

    /**
     * Store a newly created LogSemakan2 in storage.
     *
     * @param CreateLogSemakan2Request $request
     *
     * @return Response
     */
    public function store(CreateLogSemakan2Request $request)
    {
        $input = $request->all();

        $logSemakan2 = $this->logSemakan2Repository->create($input);

        Flash::success('Log Semakan2 saved successfully.');

        return redirect(route('logSemakan2s.index'));
    }

    /**
     * Display the specified LogSemakan2.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $logSemakan2 = $this->logSemakan2Repository->find($id);

        if (empty($logSemakan2)) {
            Flash::error('Log Semakan2 not found');

            return redirect(route('logSemakan2s.index'));
        }

        return view('log_semakan2s.show')->with('logSemakan2', $logSemakan2);
    }

    /**
     * Show the form for editing the specified LogSemakan2.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $logSemakan2 = $this->logSemakan2Repository->find($id);

        if (empty($logSemakan2)) {
            Flash::error('Log Semakan2 not found');

            return redirect(route('logSemakan2s.index'));
        }

        return view('log_semakan2s.edit')->with('logSemakan2', $logSemakan2);
    }

    /**
     * Update the specified LogSemakan2 in storage.
     *
     * @param  int              $id
     * @param UpdateLogSemakan2Request $request
     *
     * @return Response
     */
    public function update($id, UpdateLogSemakan2Request $request)
    {
        $logSemakan2 = $this->logSemakan2Repository->find($id);

        if (empty($logSemakan2)) {
            Flash::error('Log Semakan2 not found');

            return redirect(route('logSemakan2s.index'));
        }

        $logSemakan2 = $this->logSemakan2Repository->update($request->all(), $id);

        Flash::success('Log Semakan2 updated successfully.');

        return redirect(route('logSemakan2s.index'));
    }

    /**
     * Remove the specified LogSemakan2 from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $logSemakan2 = $this->logSemakan2Repository->find($id);

        if (empty($logSemakan2)) {
            Flash::error('Log Semakan2 not found');

            return redirect(route('logSemakan2s.index'));
        }

        $this->logSemakan2Repository->delete($id);

        Flash::success('Log Semakan2 deleted successfully.');

        return redirect(route('logSemakan2s.index'));
    }
}
