<?php

return [

    'task_graph' => [
        'class' => App\ProjectTask::class,
        'graph' => 'task_graph',
        'property_path' => 'state',
        'metadata' => [
            'title' => 'task status',
        ],

        // list of all possible states
        'states' => [
            'new',
            'in_progress',
            'completed'
        ],
        // list of all possible transitions
        'transitions' => [
            'accept_task' => [
                'from' => ['new'],
                'to' => 'in_progress',
            ],
            'finish_task' => [
                'from' =>  ['in_progress'],
                'to' => 'completed',
            ]
        ],
    ],
];
