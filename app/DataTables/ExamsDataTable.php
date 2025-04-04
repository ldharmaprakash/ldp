<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;
use App\Models\Exam;

class ExamsDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('status', function($query) {
                return "Scheduled";
            })
            ->addColumn('action', function($query) {
                $edit = '<a href="'.route('exams.edit', ['id' => $query->id]).'" class=""> <i class="fa fa-edit"></i> </a>';
                $delete = '<a href="" data-action="'.route('exams.delete', ['id' => $query->id]).'" class="" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"> <i class="fa fa-times"></i> </a>';
                return $edit." &nbsp; ".$delete;
            });
    }

    public function query(Exam $model)
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
            ['data' => 'date', 'name' => 'date', 'title' => 'Date'],
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
        return 'exams_' . date('YmdHis');
    }
}
