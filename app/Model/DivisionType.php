<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisionType extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'division_type_id';
    protected $table = 'division_types';

    protected $fillable = [
        'division_type_name'
    ];

    public function divisions()
    {
        return $this->hasMany(Division::class, 'division_type_id');
    }
}

