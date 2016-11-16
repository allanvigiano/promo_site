<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sellerName',                             //Nome da loja.
        'thumbnail_url',                          //URL do logo da loja.
        //'rating>useraveragerating>rating',        //Nota média dos usuários sobre a loja. (Formato 0.0)
        //'rating>useraveragerating>numcomments',   //Número de comentários dos usuários sobre a loja.
        //'rating>ebitrating>ratingnew',            //Nome da medalha E-bit da loja.
        //'rating>ebitrating>numcomments',          //Número de comentários no E-bit.
        'seller_id',                                 //ID da loja. It was 'id' (warning)
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id' //Column im my DB
    ];
    public function offers()
    {
        return $this->hasMany('App\Offer');
    }
}
