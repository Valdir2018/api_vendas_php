<?php



namespace App\Services;


class SellerServices 
{
     public function createNewOnSeller( array $dataset ) 
     {
         if (empty($dataset)) {
             throw new Exception('É necessário informar os dados do vendedor para cadastrar.');
         }

         
     }

     public function createNewSales() 
     {

     } 

     public function getListAllSellers() 
     {

     }

}