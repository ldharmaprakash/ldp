<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;
use App\Models\User;
use Lang;

class UsersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
        ->addColumn('status', function($query) {
            return "Active";
        })
        ->addColumn('role', function($query) {
            return $query->role_name;
        })
        ->addColumn('action',function($query) {
            $edit = '<a href="'.route('users.edit',['id' => $query->id]).'" class=""> <i class="fa fa-edit"></i> </a>';
            $delete = '<a href="" data-action="'.route('users.delete',['id' => $query->id]).'" class="" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"> <i class="fa fa-times"></i> </a>';
            return $edit." &nbsp; ".$delete;
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->select();
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
                    ->addAction()
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'id', 'name' => 'id', 'title' => 'id'],
            ['data' => 'name', 'name' => 'name', 'title' => 'name'],
            ['data' => 'email', 'name' => 'email', 'title' => 'email'],
            ['data' => 'role', 'name' => 'role', 'title' => 'role'],
            ['data' => 'status', 'name' => 'status', 'title' => 'status'],
        ];
    }

    /**
     * Get builder parameters.
     *
     * @return array
     */
    protected function getBuilderParameters(): array
    {
        return array(
            'dom' => config('datatables-buttons.parameters.dom'),
            'buttons' => config('datatables-buttons.parameters.buttons'),
        );
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'users_' . date('YmdHis');
    }
}