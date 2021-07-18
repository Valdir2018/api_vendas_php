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
            $results = array(
                'status' => 'success', 
                'message' => 'Vendedor cadastrado com sucesso', 
                'data' => $results
            );

            return $results;
        }

        http_response_code(400);
        return $results;

     }

     public function getListAllSellers() 
     {
         $all = new Seller;
         $results = $all->getAllSellers();
         
         if (!empty($results)) {
             http_response_code(200);
             return $results;
         }
         http_response_code(400);
         $results = array(
            'status' => 'error', 
            'message' => 'Não foi possivel listar os dados', 
            'data' => $results
         );
         
         return $results;
     }

     public function createNewSales() 
     {

     } 

   

}

