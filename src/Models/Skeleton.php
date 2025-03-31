<?php

namespace Danupe\Plugin\Skeleton\Models;

use Danupe\Plugin\Database\Classes\Model;

class Skeleton extends Model
{
    protected $table = 'skeletons';

    protected $attributes = [
        'id' => null,
        'text' => null,
    ];

}