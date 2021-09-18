<?php

namespace App\DataTables;

use App\Models\Permohonan;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class PermohonanDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'permohonans.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Permohonan $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Permohonan $model)
    {
        return $model->newQuery();//->where("tarikh_permohonan", "<>", "NULL");
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
            //->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
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
                "title" => "No"
            ],



            'no_ic',
            'name',
            'negeri',
            //'kategori',
            /*
            [
                "name" => "kategori", "data" => "kategori", "title" => "Kategori",
                "orderable" => true, "searchable" => true,
                "render" => "renderSpanKategoriList(data)",
                "defaultContent" => ""
            ],

            [
                "name" => "tarikh_permohonan", "data" => "tarikh_permohonan", "title" => "Tarikh Permohonan",
                "orderable" => true, "searchable" => true,
                //"render" => "statusList[data]",
                "defaultContent" => ""
            ],
            */

            [
                "name" => "status", "data" => "status", "title" => "Status Permohonan",
                "orderable" => true, "searchable" => true,
                "render" => "statusList[data]",
                "defaultContent" => ""
            ],

            [
                "name" => "jumlah_diluluskan", "data" => "jumlah_diluluskan", "title" => "Jumlah Bantuan Diluluskan",
                "orderable" => true, "searchable" => true,
                "render" => "render_jumlah_diluluskan(data)",
                "defaultContent" => ""
            ],


            //  'email',
            //  'no_tel',
            //  'no_akaun',
            // 'nama_bank'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'permohonansdatatable_' . time();
    }
}
