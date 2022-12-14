<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Translatable\HasTranslations;

class Task extends Model
{
    use LogsActivity;
    use HasTranslations;
    use SoftDeletes;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tasks';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'is_submitted', 'employee_id', 'project_id'];
    public $translatable = ['name'];



    /**
     * Change activity log event description
     *
     * @param string $eventName
     *
     * @return string
     */
    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }

   public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('Y-m-d\TH:i:s');
    }
    public function getTranslatableFields(){
        return $this->translatable;
    }
    public function employee()
    {
        return $this->belongsTo(User::class,'employee_id');
    }
    public function project()
    {
        return $this->belongsTo(Project::class,'project_id');
    }

}
