<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Notifiable;
    protected $fillable = [
        'thumbnail_url',        //URL da imagem da categoria.
        'parentCategoryId',     //ID da categoria pai.
        'isFinal',              //Flag que identifica se a categoria é final.
        'name',                 //Nome da categoria.
        'json_links',
        //'links[]',              //Lista de links da categoria.
        //'links[]>link>type',    //Existem dois casos: "category" Tipo do link que aponta para a página da categoria no site Buscapé. "xml" Tipo do link quando a URL aponta para a lista de produtos dessa categoria na API.
        //'links[]>link>url',     //URL para a página de acordo com o conteúdo do atributo type.
        'category_id',          //ID da categoria.
    ];
    protected $hidden = [
        'id'
    ];

    public function offers()
    {
        return $this->hasMany('App\Offer', 'offer_id');
    }

}
