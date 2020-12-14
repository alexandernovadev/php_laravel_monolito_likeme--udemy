<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // Indicarle a ORM que tabla de la base datos va a modificar
    protected $table = 'images';

    // Relacion de Uno a muchos
    // Una Imagen Tiene Muchos Commentarios

    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('id','desc');
        // Va traer los comentario de la Imagen
        // UNA IMAGEN TIENE MUCHOS COMENTARIOS
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
        // Va traer los likes de la Imagen
        // UNA IMAGEN TIENE MUCHOS LIKES
    }

    // MUCHAS IMAGES TIENE UN UNICO CREADOR
    // mUCHOS A unO

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
        // El segundo parametro el la llave primaria de la tabla a relacionar
    }
}
