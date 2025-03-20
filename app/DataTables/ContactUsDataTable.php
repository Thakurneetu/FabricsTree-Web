<?php

namespace App\DataTables;

use App\Models\ContactUs;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ContactUsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', 'admin.contact_us.action')
        ->editColumn('status', function ($data) {
          if($data->status == 'pending')
          {
            return '<span class="badge text-bg-warning text-white">'.ucfirst($data->status).'</span>';
          }
          else
          {
            return '<span class="badge text-bg-success text-white">'.ucfirst($data->status).'</span>';
          }
        })
        ->rawColumns(['action','status'])
        ->addIndexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ContactUs $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('contactus-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->responsive(true)
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
          Column::make('DT_RowIndex')->title('Sl No.')->width(50)->addClass('text-center')->orderable(false)->searchable(false),
          Column::make('name'),
          Column::make('email'),
          Column::make('phone'),
          Column::make('message'),
          Column::make('status'),
          Column::computed('action')
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
        return 'ContactUs_' . date('YmdHis');
    }
}
