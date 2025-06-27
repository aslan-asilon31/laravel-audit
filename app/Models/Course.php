<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Course extends Model
{
	use HasFactory, HasUuids;
	
    protected $keyType = 'string';
    public $incrementing = false;
	
    public $timestamps = true;

    protected $table = 'courses';

    protected $fillable = ['role_id','price_id','title','description'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assignments()
    {
        return $this->hasMany('App\Models\Assignment', 'course_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany('App\Models\Event', 'course_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function price()
    {
        return $this->hasOne('App\Models\Price', 'id', 'price_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function resources()
    {
        return $this->hasMany('App\Models\Resource', 'course_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role()
    {
        return $this->hasOne('App\Models\Role', 'id', 'role_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userDetails()
    {
        return $this->hasMany('App\Models\UserDetail', 'course_id', 'id');
    }
    
}
