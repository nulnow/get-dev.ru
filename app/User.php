<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getSkillsAsArray()
    {
        $skills = $this->skills_json;
        try {
            $skills = \json_decode($skills, true);
        } finally {
            if (!$skills) {
                $skills = [];
            }
        }

        return $skills;
    }

    public function setSkills(array $newSkills)
    {
        $this->skills = \json_encode($newSkills);
        $this->save();
    }

    public function renderSkills()
    {
        return implode(', ', $this->getSkillsAsArray());
    }

    public function tasks()
    {
        return $this->hasMany('\App\Task', 'creator');
    }

    public function devRequests()
    {
        return $this->hasMany('\App\DevRequest', 'from');
    }

    public function getUnAcceptedDevRequests()
    {
        return $this->devRequests->where('accepted', 0);
    }

    public function getAcceptedDevRequests()
    {
        return $this->devRequests->where('accepted', 1);
    }

    public function getIncomingDevRequestsCount()
    {
        $tasks = $this->tasks;
        $count = 0;
        foreach ($tasks as $task) {
            try {
                $count += count($task->getUnAcceptedDevRequests() || []);
            } catch (Exception $e) {

            }
        }
        return $count;
    }

    public function checkIfOwnTask($taskId)
    {
        $task = \App\Task::find($taskId);
        return $this->id === $task->creator;
    }

}
