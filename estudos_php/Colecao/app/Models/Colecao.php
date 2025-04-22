<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Class_;

class Colecao extends Model
{
    use HasFactory;

    protected $table = 'colecoes';
    protected $fillable = [
        'nome',
        'descricao'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getCreatedAtAttribute(){
        return Carbon::parse($this->attributes['created_at'])->format('d/m/Y');
    }
    public function getUpdatedAtAttribute(){
        return Carbon::parse($this->attributes['updated_at'])->format('d/m/Y');
    }
    public function getDeletedAtAttribute(){
        return Carbon::pare($this->attributes['deleted_at'])->format('d/m/Y');
    }
    public function categorias(){
        return $this->hasMany(Categoria::class,'colecao_id');
    }

    public function prateleiras(){
        return $this->hasMany(Prateleira::class,'colecao_id');
    }
    
}
