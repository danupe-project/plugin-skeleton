<?php
return [
    'up' => '
        INSERT INTO skeletons (`text`) VALUES ("test");
    ',
    'down' => '
        DELETE FROM skeletons WHERE id = 1;
    '
];
