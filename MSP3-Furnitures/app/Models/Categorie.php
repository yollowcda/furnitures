<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $table = 'categorie';

    protected $fillable = ['libelle'];

    protected $primaryKey = 'idcategorie';

    public $incrementing = true;
    protected $keyType = 'int';

    // Relation inverse avec Furniture
    public function furnitures()
    {
        return $this->hasMany(Furniture::class, 'category', 'idcategorie');
    }
}
