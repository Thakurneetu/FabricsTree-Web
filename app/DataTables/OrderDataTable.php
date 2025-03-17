<?php

namespace App\DataTables;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrderDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', 'admin.order.action')
        ->rawColumns(['action','status'])
        ->editColumn('status', function ($data) {
          if($data->status == 'Pending') {
            return '<span class="badge text-bg-warning text-white">'.ucfirst($data->status).'</span>';
          }
          else {
            return '<span class="badge text-bg-success text-white">'.ucfirst($data->status).'</span>';
          }
        })
        ->addIndexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Order $model): QueryBuilder
    {
        return $model->newQuery()->with('customer:id,name,email,phone');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('order-table')
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
          Column::make('id')->visible(false),
          Column::make('DT_RowIndex')->title('Sl No.')->width(50)->addClass('text-center')->orderable(false),
          Column::make('invoice_no')->title('Order ID'),
          Column::make('customer.name')->title('Customer Name')->sortable(false),
          Column::make('customer.email')->title('Email')->sortable(false),
          Column::make('customer.phone')->title('Phone')->sortable(false),
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
        return 'Order_' . date('YmdHis');
    }
}
