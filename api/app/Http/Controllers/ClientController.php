<?php

namespace HttpClient\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use HttpClient\Http\Requests;

class ClientController extends Controller
{
    protected function performRequest($method, $url, $parameter=[]){

        $client = new Client;
        $response = $client->request($method, $url, $parameter);
        return $response->getBody()->getContents();

    }

    protected function performGetRequest($url,$data=[]){
      $contents = $this->performRequest('GET',$url, [
           'headers' => [
           'Authorization'=>'Token token=GSy-m9v9xhrRzyxrQQqy'
         ]
    ]);

      $decodedContents = json_decode($contents);
      return $decodedContents->$data;
    }

    protected function performGetRequest_lms($url,$data=[]){
      $contents = $this->performRequest('GET',$url);

      $decodedContents = $contents;
      return json_decode($decodedContents)->$data;
    }

    protected function performGetRequestVar($url,$data=[]){
      $contents = $this->performRequest('GET',$url, [
           'headers' => [
           'Authorization'=>'Token token=GSy-m9v9xhrRzyxrQQqy'
         ]
    ]);

      $decodedContents = $contents;
      return $decodedContents;
    }

    protected function obtainCustomerInformationByLeadid($lead_id,$company_id){
      return $this->performGetRequest_lms("http://49.207.182.88:8089/remap-lms/api/v1/LeadSearch?category=Lead&Search_Text={$lead_id}&Company_id={$company_id}",'Datasets');
    }

    protected function obtainRootCategories(){
      return $this->performGetRequest('http://api.catalog.remapweb.com/v1/companies/2/show_rootcat','rootcats');
    }

    protected function obtainSubCategory($rootcat_id){
       return $this->performGetRequest("http://api.catalog.remapweb.com/v1/companies/2/show_subcat/?parent_id={$rootcat_id}",'subcats');
    }

    protected function obtainGroup($subcat_id){
       return $this->performGetRequest("http://api.catalog.remapweb.com/v1/companies/2/show_group/?parent_id={$subcat_id}",'groups');
    }

    protected function obtainProducts($group_id){
       return $this->performGetRequest("http://api.catalog.remapweb.com/v1/products/{$group_id}/for_group", 'products');
    }

    protected function obtainVariations($product_id){
       return $this->performGetRequestVar("http://api.catalog.remapweb.com/v1/variations/2/product_variation/?product_id={$product_id}", $product_id );   
    }
    protected function getFirstAttrSet($product_id){
       return $this->performGetRequestVar("http://api.catalog.remapweb.com/v2/variations/get_first_attribute_set/?product_id={$product_id}", $product_id );
    }
    protected function getNextAttrSet($query){
       return $this->performGetRequestVar("http://api.catalog.remapweb.com/v2/variations/get_next_attribute_set/?{$query}", $query );
    }

    protected function sendVariation($variation, $product_id){


      $str = "";
      foreach ($variation as $key => $value) {
        if($key != '_token')
          $str = $str . '"'.str_replace("_", " ", $key).'"=>"'.$value.'", ';
      }
      $realurl = 'http://api.catalog.remapweb.com/v2/variations/13145/product_attribute_variation/?product_id='.$product_id.'&attribute_values='.$str.'';
      $url = 'http://api.catalog.remapweb.com/v1/variations/13145/product_attribute_variation/?product_id=40&attribute_values="type"=>"TETEI ", "color"=>"White", "glass"=>"3/16 Rain", "width"=>"58-60", "height"=>"57.375", "{\"style\""=>"Sliding"';

      $contents =  $this->performRequest('GET',$realurl, [
           'headers' => [
           'Authorization'=>'Token token=GSy-m9v9xhrRzyxrQQqy'
         ]
    ]);
      $decodedContents = json_decode($contents);
      return $decodedContents;
       // return $this->performGetRequestVar("'TETEI'>http://api.catalog.remapweb.com/v1/variations/2/product_variation/?product_id={$product_id}", $product_id );
    }
}
