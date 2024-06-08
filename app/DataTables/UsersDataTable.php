<?php

namespace App\DataTables;

use Carbon\Carbon;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class UsersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', 'users.action')
            ->setRowId('id')
            ->addColumn('action', function ($row) {
                $data = '<button type="button" data-id=' . $row->id . ' data-jenis="edit"  class="btn btn-sm action btn-rounded btn-warning"><i class="mdi mdi-lead-pencil"></i></button>';
                $data .= ' <button type="button" data-id=' . $row->id . ' data-jenis="delete" class="btn btn-sm action btn-rounded btn-danger"><i class="mdi mdi-close-circle"></i></button>';
                $data .= ' <button type="button" data-id=' . $row->id . ' data-jenis="show" class="btn btn-sm action btn-rounded btn-info"><i class="mdi mdi-eye"></i></button>';
                return $data;
            })
            ->addColumn('checkbox', function ($row) {
                if ($row->role == 'admin') {
                    $cek = '<div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="" disabled> 
                                <i class="input-helper"></i>
                            </label>
                        </div>';
                } else {
                    $cek = '<div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value=' . $row->id . ' name="id[]"> 
                                <i class="input-helper"></i>
                            </label>
                        </div>';
                }

                return $cek;
            })
            ->addColumn('status_biodata', function ($row) {
                if ($row->status_biodata == 0) {
                    $status_biodata = 'TIDAK LENGKAP';
                } elseif ($row->status_biodata == 1) {
                    $status_biodata = 'LENGKAP';
                } else {
                    $status_biodata = 'Reset';
                }

                return $status_biodata;
            })
            ->addColumn('waktu_login', function ($row) {
                return date('d/m/Y - H:m', strtotime($row->waktu_login));
            });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->parameters(['serachDelay' => 1000])
            ->setTableId('users-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->searchable(false)->orderable(false),
            Column::make('name'),
            Column::make('email'),
            Column::make('username'),
            Column::make('role'),
            Column::make('waktu_login'),
            Column::make('status_biodata')->title('Biodata')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::computed('checkbox')->title('Pilih')->searchable(false)->orderable(false)
                ->searchable(false)
                ->orderable(false)
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
