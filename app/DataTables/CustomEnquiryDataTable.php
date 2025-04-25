<?php

namespace App\DataTables;

use App\Models\Enquiry;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Carbon\Carbon;
class CustomEnquiryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', 'admin.custom_enquiry.action')
        ->editColumn('created_at', function ($data) {
          return Carbon::parse($data->created_at)->format('d F, Y h:i a');
        })
        ->editColumn('enquery_type', function ($data) {
          if($data->enquery_type == 'custom')
          {
            return '<span class="badge text-bg-warning text-white">Yes</span>';
          }
          else
          {
            return '<span class="badge text-bg-success text-white">No</span>';
          }
        })
        ->editColumn('status', function ($data) {
          if($data->status == 'submitted') {
            return '<span class="badge text-bg-danger text-white">Pending</span>';
          }
          else{
            return '<span class="badge text-bg-success text-white">Reviewed</span>';
          }
        })
        ->rawColumns(['action','enquery_type','status'])
        ->addIndexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Enquiry $model): QueryBuilder
    {
        return $model->newQuery()->where('enquery_type',$this->type)->with('items', 'customer');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('enquiry-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->responsive(true)
                    ->orderBy(0)
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
            Column::make('id')->title('')->visible(false)->searchable(false),
            Column::make('DT_RowIndex')->title('Sl No.')->width(50)->addClass('text-center')->orderable(false)->searchable(false),
            Column::make('created_at')->addClass('text-center')->searchable(false),
            Column::make('customer.name')->sortable(false),
            Column::make('customer.phone')->sortable(false),
            Column::make('customer.email')->sortable(false),
            Column::make('status')->addClass('text-center'),
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
        return 'Category_' . date('YmdHis');
    }
}
