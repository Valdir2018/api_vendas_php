<?php



namespace App\Services;


class SellerServices 
{
     public function createNewOnSeller( array $dataset ) 
     {
         if (empty($dataset)) {
             throw new Exception('É necessário informar os dados do vendedor para cadastrar.');
         }

         
         if (!empty($_POST)) {
            
             var_dump($_POST);
         }

         
     }

     public function createNewSales() 
     {

     } 

     public function getListAllSellers() 
     {

     }

}