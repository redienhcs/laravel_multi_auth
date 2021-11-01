<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pessoa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pessoas';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = ['nome_pessoa'];

    public function usuario (){
        return $this->hasOne( Usuario::class);
    }

    public function cliente (){
        return $this->hasOne( Cliente::class);
    }
}
