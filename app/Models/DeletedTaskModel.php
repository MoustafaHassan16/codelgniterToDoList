<?php

namespace App\Models;

use CodeIgniter\Model;

class DeletedTaskModel extends Model
{
    protected $table = 'deleted_tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['task_id', 'title', 'description', 'deleted_at'];
}