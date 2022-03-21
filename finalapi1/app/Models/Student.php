<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Student extends Model
{
    use HasFactory;
    protected $table='students';
    public $timestamps=false;
    protected $primaryKey='id';
    public $incrementing = true;
    protected $keyType='int';
    public function department(){
        return $this->belongsTo(Department::class,'d_id');
    }
}
