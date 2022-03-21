<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;


class Department extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $primaryKey='id';
    public $incrementing = true;
    protected $keyType='int';
    protected $table='departments';
    public function students(){
        return $this->hasMany(Student::class,'d_id','id');
    }
}
