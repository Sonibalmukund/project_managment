<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    //
    use HasFactory;
    protected $fillable = ['project_id', 'title', 'description', 'developer_id', 'status'];

    public function project() {
        return $this->belongsTo(Project::class);
    }
    public function developer() {
        return $this->belongsTo(User::class, 'developer_id');
    }
}
