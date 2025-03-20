<?php

namespace App\Models;

use CodeIgniter\Model;

class CompletedTaskModel extends Model
{
    protected $table = 'completed_tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['task_id', 'title', 'description', 'completed_time'];
}