<?php

namespace App\DataTables;

use App\Models\LogSemakan2;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class LogSemakan2DataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'log_semakan2s.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\LogSemakan2 $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(LogSemakan2 $model)
    {
        return $model->newQuery()->with(['pemohon']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                   // ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [

            [
                "searchable" => false,
                "orderable" => false,
                "targets" => 0,
                "defaultContent" => "",
                "name" => "id", "data" => "id",
               // "render" => "renderColumnNo( data, type, full, meta )",
                "title" => "No"
            ],

            [
                "name" => "no_ic", "data" => "no_ic", "title" => "IC",
                "orderable" => true, "searchable" => true,

                "defaultContent" => ""
            ],

            [
                "name" => "pemohon.name", "data" => "pemohon.name", "title" => "Nama",
                "orderable" => true, "searchable" => true,
               // "render" => "renderNama(data, type, full, meta)",
                "defaultContent" => ""
            ],




            [
                "name" => "created_at", "data" => "created_at", "title" => "Tarikh/Masa",
                "orderable" => true, "searchable" => true,

                "defaultContent" => ""
            ],

            [
                "name" => "ip", "data" => "ip", "title" => "IP Address",
                "orderable" => true, "searchable" => true,

                "defaultContent" => ""
            ],







        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'log_semakan2sdatatable_' . time();
    }
}
