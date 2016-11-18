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
    protected $offer_id;
    protected $offerName;
    protected $links;
    protected $thumbnailUrl;
    protected $priceValue;
    protected $priceFromValue;
    protected $discountPercent;
    protected $categoryId;
    protected $productId;

    protected $fillable = [
        'offer_id',             //ID da oferta.
        'offerName',            //Nome da oferta.
        'links',                //Lomadee offer link
        'thumbnailUrl',         //URL da imagem da oferta.
        'priceValue',           //Valor da oferta (Preço por: ). (Formato 0.0)
        'priceFromValue',       //Preço da oferta (Preço de: ). (Formato 0.0)
        'discountPercent',   //Porcentagem de desconto.
        'categoryId',  //ID da categoria. It was categoryId (warning!!!!!)

        'productId',   //ID do produto.
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'created_at', 'updated_at'
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
