<?php

return [
    'up' => '
    CREATE TABLE IF NOT EXISTS skeletons (
        id INT AUTO_INCREMENT PRIMARY KEY,
        `text` TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
',
    'down' => '
    DROP TABLE IF EXISTS skeletons;
'
];
