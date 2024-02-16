<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id'
        'title',
        'date',
        'start_date',
        'end_start',
    ];

    public function task(){
        return $this->hasOne('App\Models\Task')
    }
}
