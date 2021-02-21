<?php

namespace App\DataTables;

use App\DataTables\Table;
use App\Models\Admin;

class AdminTable extends Table
{
    /**
     * Get query source of dataTable.
     *
     */
    private function query()
    {
        return Admin::select('id', 'username', 'name');
    }

    /**
     * Build DataTable class.
     */
    public function build()
    {
        $table = Table::of($this->query());
        $table->addIndexColumn();


        $table->addColumn('action', function (Admin $model) {
            // $view = route('superuser.account.superuser.show', $model);
            // $edit = route('superuser.account.superuser.edit', $model);
            // $destroy = route('superuser.account.superuser.destroy', $model);

            $view = 'view';
            $edit = 'edit';
            $destroy = 'destroy';

            if ($model->username == 'admin') {
                $delete = $destroy;
            } else {
                $delete = '';
            }

            return "
                <a href=\"{$view}\">
                    <button type=\"button\" class=\"btn btn-sm btn-circle btn-alt-secondary\" title=\"View\">
                        <i class=\"fa fa-eye\"></i>
                    </button>
                </a>
                <a href=\"{$edit}\">
                    <button type=\"button\" class=\"btn btn-sm btn-circle btn-alt-warning\" title=\"Edit\">
                        <i class=\"fa fa-pencil\"></i>
                    </button>
                </a>
                {$delete}
            ";
        });

        $table->rawColumns(['action']);

        return $table->make(true);
    }
}
