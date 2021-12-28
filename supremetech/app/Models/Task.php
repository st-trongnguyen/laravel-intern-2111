<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'title',
        'description',
        'type',
        'status',
        'start_date',
        'due_date',
        'assignee',
        'estimate',
        'actual'
    ];

    public function getTypeLabelAttribute()
    {
        return [
            '1' => 'Story',
            '2' => 'Task',
            '3' => 'Bug',
        ][$this->type];
    }

    public function getStatusLabelAttribute()
    {
        return [
            '1' => 'Open',
            '2' => 'In progress',
            '3' => 'Resolved',
            '4' => 'Pending',
            '5' => 'Verified',
            '6' => 'Closed',
        ][$this->status];
    }

    /**
     *Query scope to include only tasks that have not been SoftDelete.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTaskNotDeleted($query)
    {
        return $query->whereNull('deleted_at');
    }
}
