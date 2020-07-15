<?php

return [
    'task_graph' => [
        // class of your domain object
        'class' => App\ProjectTask::class,

        // name of the graph (default is "default")
        'graph' => 'graphA',

        // property of your object holding the actual state (default is "state")
        'property_path' => 'state',

        'metadata' => [
            'title' => 'task status',
        ],

        // list of all possible states
        'states' => [
            'new',
            'in_process',
            'completed'
        ],
        // list of all possible transitions
        'transitions' => [
            'accept_task' => [
                'from' => ['new'],
                'to' => 'in_process',
            ],
            'finish_task' => [
                'from' =>  ['in_process'],
                'to' => 'completed',
            ]
        ],
    ],
];
