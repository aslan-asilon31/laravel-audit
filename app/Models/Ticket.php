<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Ticket extends Model
{
	use HasFactory, HasUuids;
	
    protected $keyType = 'string';
    public $incrementing = false;
    
    public $timestamps = true;

    protected $table = 'prices';

    protected $fillable = ['name','price','features'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
        return $this->hasMany('App\Models\Course', 'price_id', 'id');
    }
    
}
