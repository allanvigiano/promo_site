<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

use App\Offer;

class OfferController extends Controller
{
    protected $format = 'json';
    protected $client;
    protected $sourceId;
    protected $appToken;
    protected $category = 77;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' =>  env('BASE_URL'), // Base URI is used with relative requests.
            'timeout'  => 10.0,             // You can set any number of default request options.
        ]);
        $this->sourceId = env('SOURCE_ID');
        $this->appToken = env('APP_TOKEN');
    }

    /**
     * Display a the best offer or the number of results specified. The category is by default 77 (smartphone).
     *
     * @param int $results
     * @param int $category
     * @return \Illuminate\Http\Response
     */
    public function topOffers($results)
    {
        dd('aqui');
        $response = $this->client->request('GET', "service/v2/topOffers/lomadee/$this->appToken/BR/?", [
            "query" => ['sourceId'=> $this->sourceId, 'categoryId' => $this->category, 'results' => $results, 'format' => format]
        ]);
        $list = $response->getBody()->getContents();
        $json = json_decode($list);
        //dd($json->offer[0]->id); exit;
        $offer = new Offer();
        $offer->offer_id =            $json->offer[0]->id;
        $offer->offerName =           $json->offer[0]->offerName;
        $offer->links =               json_encode($json->offer[0]->links);
        $offer->thumbnailUrl =        $json->offer[0]->thumbnail->url;
        $offer->priceValue =          $json->offer[0]->priceValue;
        $offer->priceFromValue =      $json->offer[0]->priceFromValue;
        $offer->discountPercent =     $json->offer[0]->discountPercent;
        $offer->categoryId =          $json->offer[0]->categoryId;
        $offer->productId =           $json->offer[0]->productId;
        return response($offer->toJson())
            ->header('Content-Type', 'application/json');
    }

    /**
     * Display the specified offer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = $this->client->request('GET', "service/findOfferList/lomadee/$this->appToken/BR/?", [
            "query" => ['sourceId'=> $this->sourceId, 'offerId' => $id, 'format' => 'json']
        ]);
        return response($response->getBody()->getContents())
            ->header('Content-Type', 'application/json');
    }

    public function storeOffers() {
        $response = $this->client->request('GET', "service/v2/topOffers/lomadee/$this->appToken/BR/?", [
            "query" => ['sourceId'=> $this->sourceId, 'categoryId' => 77, 'results' => 2, 'format' => 'json']
        ]);
        $list = $response->getBody()->getContents();
        $json = json_decode($list);
        //dd($json->offer[0]->id); exit;
        $offer = new Offer();

        $offer->offer_id =            $json->offer[0]->id;
        $offer->offerName =           $json->offer[0]->offerName;
        $offer->links =               json_encode($json->offer[0]->links);
        $offer->thumbnailUrl =        $json->offer[0]->thumbnail->url;
        $offer->priceValue =          $json->offer[0]->priceValue;
        $offer->priceFromValue =      $json->offer[0]->priceFromValue;
        $offer->discountPercent =     $json->offer[0]->discountPercent;
        $offer->categoryId =          $json->offer[0]->categoryId;
        $offer->productId =           $json->offer[0]->productId;

        $offer->save();
        dd($offer);
        /*
         * uma alteração para teste
         */


    }
}
