<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Figura extends Model
{
    use HasFactory;

    protected $table = 'figuras';

    protected $fillable = [
        'categoria_id',
        'prateleira_id',
        'nome',
        'lancamento',
        'recebimento',
        'observacoes',
        'foto'
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

    public function categoria(){
        return $this->belongsTo(Categoria::class,'categoria_id');
    }

    public function prateleira(){
        return $this->belongsTo(Prateleira::class,'prateleira_id');
    }
}
