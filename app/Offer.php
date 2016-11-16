<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'offerName',            //Nome da oferta.
        'categoryName',         //Nome da categoria da oferta.
        'offer_link',           //Lomadee offer link
        //'links>link[]',         //Lista de links da oferta.
        //'links>link[]>type',    //Tipo do link. Manter "offer".
        //'links>link[]>url',     //URL da oferta.
        'thumbnail>url',        //URL da imagem da oferta.
        'priceValue',           //Valor da oferta (Preço por: ). (Formato 0.0)
        'priceFromValue',       //Preço da oferta (Preço de: ). (Formato 0.0)
        'discountPercentage',   //Porcentagem de desconto.
        'category_id',  //ID da categoria. It was categoryId (warning!!!!!)
        'offer_id',    //ID da oferta.
        'productId',   //ID do produto.
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
    ];

    public function seller()
    {
        return $this->belongsTo('App\Seller');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
