<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    public function owner()
    {
        return $this->belongsTo('\App\User', 'creator');
    }

    public function allDevRequests()
    {
        return $this->hasMany('\App\DevRequest', 'task_id');
    }

    public function getAcceptedDevRequests()
    {
        return $this->allDevRequests->where('accepted', true);
    }

    public function getUnAcceptedDevRequests()
    {
        return $this->allDevRequests->where('accepted', false);
    }

}
