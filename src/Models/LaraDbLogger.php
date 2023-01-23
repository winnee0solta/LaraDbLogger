<?php

namespace Winnee0solta\Laradblogger\Models;

use Illuminate\Database\Eloquent\Model;

class LaraDbLogger extends Model
{

    protected $table = 'lara_db_loggers';

    protected $fillable = [
        'message',
        'trace',
        'file',
        'line',
        'class',
        'function',
        'path',
        'method',
        'ip',
        'user_agent',
        'user_id',
        'input',
    ];
}
