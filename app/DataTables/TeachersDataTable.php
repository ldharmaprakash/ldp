<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;
use App\Models\Teacher;

class TeachersDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('status', function($query) {
                return "Active";
            })
            ->addColumn('action', function($query) {
                $edit = '<a href="'.route('teachers.edit', ['id' => $query->id]).'" class=""> <i class="fa fa-edit"></i> </a>';
                $delete = '<a href="" data-action="'.route('teachers.delete', ['id' => $query->id]).'" class="" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"> <i class="fa fa-times"></i> </a>';
                return $edit." &nbsp; ".$delete;
            });
    }

    public function query(Teacher $model)
    {
        return $model->select();
    }

    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction()
                    ->parameters($this->getBuilderParameters());
    }

    protected function getColumns()
    {
        return [
            ['data' => 'id', 'name' => 'id', 'title' => 'ID'],
            ['data' => 'name', 'name' => 'name', 'title' => 'Name'],
            ['data' => 'email', 'name' => 'email', 'title' => 'Email'],
            ['data' => 'status', 'name' => 'status', 'title' => 'Status'],
        ];
    }

    protected function getBuilderParameters(): array
    {
        return array(
            'dom' => config('datatables-buttons.parameters.dom'),
            'buttons' => config('datatables-buttons.parameters.buttons'),
        );
    }

    protected function filename(): string
    {
        return 'teachers_' . date('YmdHis');
    }
}
