<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    use HasFactory;

    // Nom de la table dans la base de données
    protected $table = 'furniture';

    // Les attributs qui peuvent être assignés en masse
    protected $fillable = ['title', 'price', 'description', 'category'];

    // La clé primaire de la table
    protected $primaryKey = 'id';

    // Si la clé primaire n'est pas auto-incrémentée ou n'est pas un entier
    public $incrementing = true;
    protected $keyType = 'int';

    // Relation avec la catégorie
    public function category()
    {
        return $this->belongsTo(Categorie::class, 'category', 'idcategorie');
    }
}
