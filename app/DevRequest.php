<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DevRequest extends Model
{
    public function user()
    {
        return $this->belongsTo('\App\User', 'from');
    }

    public function task()
    {
        return $this->belongsTo('\App\Task', 'task_id');
    }

}
