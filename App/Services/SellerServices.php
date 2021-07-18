<?php



namespace App\Services;
use App\Models\Seller;

use Exception;


class SellerServices 
{
     public function createNewOnSeller( array $dataset ) 
     {
        if (in_array('', $dataset)) {
            http_response_code(404);
            throw new Exception('É necessário informar os dados do vendedor para cadastrar.');
            die;
        }

        $newSeller = new Seller;
        $results = $newSeller->save($dataset);

        if (!empty($results)) {
            http_response_code(201);
            return $results;
        }

        http_response_code(400);
        return $results;

     }

     public function createNewSales() 
     {

     } 

     public function getListAllSellers() 
     {

     }

}

