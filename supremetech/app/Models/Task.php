<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use function PHPSTORM_META\type;

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

    public function getTypeAttribute($value)
    {
        return [
            '1' => 'Story',
            '2' => 'Task',
            '3' => 'Bug',
        ][$value];
    }

    public function setTypeAttribute($value)
    {
        $type = [
            1 => 'Story',
            2 => 'Task',
            3 => 'Bug',
        ];
        $this->attributes['type'] = array_search($value, $type);
    }

    public function getStatusAttribute($value)
    {
        return [
            '1' => 'Open',
            '2' => 'In progress',
            '3' => 'Resolved',
            '4' => 'Pending',
            '5' => 'Verified',
            '6' => 'Closed',
        ][$value];
    }

    public function setStatusAttribute($value)
    {
        $status = [
            1 => 'Open',
            2 => 'In progress',
            3 => 'Resolved',
            4 => 'Pending',
            5 => 'Verified',
            6 => 'Closed',
        ];
        $this->attributes['status'] = array_search($value, $status);
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

    /**
     *Query scope get task with id equal to $id
     */
    public function scopeGetTask($query, $id)
    {
        return $query->find($id);
    }
}
