<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadService extends Model
{
    protected $fillable = ['name', 'description'];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
