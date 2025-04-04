<?php

return [
    /*
     * Namespaces used by the generator.
     */
    'namespace' => [
        /*
         * Base namespace/directory to create the new file.
         * This is appended on default Laravel namespace.
         * Usage: php artisan datatables:make User
         * Output: App\DataTables\UserDataTable
         * With Model: App\User (default model)
         * Export filename: users_timestamp
         */
        'base' => 'DataTables',

        /*
         * Base namespace/directory where your model's are located.
         * This is appended on default Laravel namespace.
         * Usage: php artisan datatables:make Post --model
         * Output: App\DataTables\PostDataTable
         * With Model: App\Post
         * Export filename: posts_timestamp
         */
        'model' => 'App\\Models',
    ],

    /*
     * Set Custom stub folder
     */
    //'stub' => '/resources/custom_stub',

    /*
     * PDF generator to be used when converting the table to pdf.
     * Available generators: excel, snappy
     * Snappy package: barryvdh/laravel-snappy
     * Excel package: maatwebsite/excel
     */
    'pdf_generator' => 'snappy',

    /*
     * Snappy PDF options.
     */
    'snappy' => [
        'options' => [
            'no-outline' => true,
            'margin-left' => '0',
            'margin-right' => '0',
            'margin-top' => '10mm',
            'margin-bottom' => '10mm',
        ],
        'orientation' => 'landscape',
    ],

    /*
     * Default html builder parameters.
     */
    'parameters' => [
        'dom' => '<"row"<"col-sm-12 col-md-5"l><"col-sm-12 col-md-4"B><"col-sm-12 col-md-3"f>>r<"table-responsive mt-2"t><"row mt-3"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        'order' => [[0, 'desc']],
        'buttons' => [
            'excel',
            'csv',
            'print',
        ],
    ],

    /*
     * Generator command default options value.
     */
    'generator' => [
        /*
         * Default columns to generate when not set.
         */
        'columns' => 'id,add your columns,created_at,updated_at',

        /*
         * Default buttons to generate when not set.
         */
        'buttons' => 'excel,csv,pdf,print,reset,reload',

        /*
         * Default DOM to generate when not set.
         */
        'dom' => 'Bfrtip',
    ],
];
