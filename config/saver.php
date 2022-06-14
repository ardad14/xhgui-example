<?php

use Xhgui\Profiler\Profiler;

return [
    'save.handler' => Profiler::SAVER_MONGODB,
    'save.handler.mongodb' => array(
        'dsn' => 'mongodb://xhgui-example-mongodb:27017',
        'database' => 'xhprof',
        // Allows you to pass additional options like replicaSet to MongoClient.
        // 'username', 'password' and 'db' (where the user is added)
        'options' => array(
            'username' => 'root',
            'password' => 'root'
        ),
        // Allows you to pass driver options like ca_file to MongoClient
        'driverOptions' => array(),
    ),
];
