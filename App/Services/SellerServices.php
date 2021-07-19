<?php



namespace App\Services;
use App\Email\EmailCustom;

use App\Models\Seller;
use App\Models\Sale;
use Exception;

class SellerServices 
{    const PERCENTUAL = 8.5;

     public function createNewOnSeller( array $dataset ) : array
     {
        if (in_array('', $dataset)) {
            http_response_code(404);
            throw new Exception('É necessário informar os dados do vendedor para cadastrar.');
            die;
        }

        $newSeller = new Seller;
        $results = $newSeller->addSeler($dataset);

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

     public function getListAllSellers() : array
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

     public function createNewSales( array $dataset )
     {
        if (in_array('', $dataset)) {
            http_response_code(404);
            throw new Exception('Não foi possivel concluir a venda');
            die;
        }

        $dataset['comissao'] = $this->getPercentualFromSale($dataset['valor_venda']);

        $saveNewSale = new Sale;
        $results = $saveNewSale->addSale($dataset);

        if (!empty($results)) {
            http_response_code(201);
            $results = array(
                'status' => 'success', 
                'message' => 'Venda lançada com sucesso', 
                'data' => $results
            );
            return $results;
        }
        http_response_code(400);
        return $results;
     }
     
     private function getPercentualFromSale($currentSaleTotal) : string
     {   
         return ($currentSaleTotal *  self::PERCENTUAL) / 100;
     }

     public function getAllSalesFromSelerId(array $currentIdSelerFromSales ) : array
     {
        $fetchAllSales = new Sale;
        $results = $fetchAllSales->getSalesFromIdSeler($currentIdSelerFromSales);


        if (isset( $currentIdSelerFromSales['sendmail'] )) {
            EmailCustom::contentMail($results);
        }

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

   

}

