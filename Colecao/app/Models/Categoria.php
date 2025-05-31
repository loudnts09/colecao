<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categorias';

    protected $fillable = [
        'colecao_id',
        'nome',
        'descricao',
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
        return Carbon::parse($this->attributes['deleted_at'])->format('d/m/Y');
    }
    public function colecao(){
        return $this->belongsTo(Colecao::class,'colecao_id');
    }
}
