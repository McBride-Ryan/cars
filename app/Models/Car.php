<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'founded', 'description'];

    public function CarModels(){
        return $this->hasMany(CarModel::class);
    }

    public function headquarter(){
        return $this->hasOne(Headquarter::class);
    }

    // Define a has many through relationship 
    public function engines(){
        return $this->hasManyThrough(
            Engine::class,
            CarModel::class,
            'car_id', 
            'model_id'
        );
    }

    public function productionDate(){
        return $this->hasOne(
            CarProductionDate::class,
            'model_id'
        );
    }

}
