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

        // $table->setRowClass(function (Superuser $model) {
        //     return !$model->is_active ? 'table-danger' : '';
        // });

        // $table->editColumn('is_active', function (Superuser $model) {
        //     $active = '<i class="fa fa-lg fa-check text-success"></i>';
        //     $inactive = '<i class="fa fa-lg fa-close text-danger"></i>';

        //     return ($model->is_active) ? $active : $inactive;
        // });

        // $table->editColumn('image', function (Superuser $model) {
        //     return "
        //       <a class=\"img-link img-link-zoom-in img-lightbox\" href=\"{$model->img}\">
        //         <img class=\"img-fluid img-table\" src=\"{$model->img}\">
        //       </a>
        //     ";
        // });

        $table->addColumn('action', function (Admin $model) {
            // $view = route('superuser.account.superuser.show', $model);
            // $edit = route('superuser.account.superuser.edit', $model);
            // $destroy = route('superuser.account.superuser.destroy', $model);
            // $restore = route('superuser.account.superuser.restore', $model);

            $view = '';
            $edit = '';
            $destroy = '';
            $restore = '';

            // if ($model->is_active) {
            //     $toggle = "
            //         <a href=\"javascript:deleteConfirmation('{$destroy}')\">
            //             <button type=\"button\" class=\"btn btn-sm btn-circle btn-alt-danger\" title=\"Delete\">
            //                 <i class=\"fa fa-times\"></i>
            //             </button>
            //         </a>
            //     ";
            // } else {
            //     $toggle = "
            //         <a href=\"javascript:restoreConfirmation('{$restore}')\">
            //             <button type=\"button\" class=\"btn btn-sm btn-circle btn-alt-info\" title=\"Restore\">
            //                 <i class=\"fa fa-undo\"></i>
            //             </button>
            //         </a>
            //     ";
            // }

            // if (Auth::guard('superuser')->user()->hasRole('SuperAdmin') == false) {
            //     $toggle = '';
            // }

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
            ";
            // $toggle
        });
        
        // $table->rawColumns(['is_active', 'image', 'action']);
        $table->rawColumns(['action']);

        return $table->make(true);
    }
}
