<?php

namespace App\Http\Controllers;

class DataTableController extends Controller
{
    public function users()
    {
        $columns = [
            [
                'field' => 'id',
                'label' => 'ID',
                'sortable' => true,
            ],
            [
                'field' => 'name',
                'label' => 'Name',
                'sortable' => true,
                'searchable' => true,
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'searchable' => true,
            ],
        ];

        return view('datatable-test', compact('columns'));
    }
}