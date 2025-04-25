<?php

namespace App\DataTables;

use App\Models\ManufacturerProduct;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ManufacturerProductDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', 'admin.manufacturer.product_action')
        ->rawColumns(['action'])
        ->addIndexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ManufacturerProduct $model): QueryBuilder
    {
        return $model->newQuery()->where('customer_id', $this->id);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('manufacturerproduct-table')
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
          Column::make('title'),
          Column::make('wrap'),
          Column::make('weft'),
          Column::make('width'),
          Column::make('count'),
          Column::make('reed'),
          Column::make('pick')->title('Pik'),
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
        return 'ManufacturerProduct_' . date('YmdHis');
    }
}
