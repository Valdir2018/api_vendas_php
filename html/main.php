<?php
header('Content-Type: application/json');
require "../vendor/autoload.php";

try 
{

    if (isset($_REQUEST['seller'])) {
        $data = json_decode($_POST['seller'], true);
        
        $class = '\App\Services\\'.ucfirst($data['classname']).'Services';        
        $method = (string) $data['method'];
        
        $newSeller = array( 'nome' => $data['nome'], 'email' => $data['email']);

        if (class_exists($class) && method_exists($class, $method)) {
            $response = call_user_func_array( array( new $class, $method ), array($newSeller) );
            
            echo json_encode( $response );
    		exit;
        }

    }

    if (isset($_REQUEST['getAllSeller'])) {
        $data = json_decode($_POST['getAllSeller'], true);

        $class = '\App\Services\\'.ucfirst($data['classname']).'Services';        
        $method = (string) $data['method'];
        
        if (class_exists($class) && method_exists($class, $method)) {
            $response = call_user_func( array( new $class, $method) );
            
            echo json_encode( $response );
    		exit;
        }
    }

    if (isset($_REQUEST['new_sale'])) {
        $data = json_decode($_POST['new_sale'], true);

        $newSale = array( 'id' => $data['id'], 'valor_venda' => $data['valor_venda']);

        $class = '\App\Services\\'.ucfirst($data['classname']).'Services';        
        $method = (string) $data['method'];
        
        if (class_exists($class) && method_exists($class, $method)) {
            $response = call_user_func( array( new $class, $method), $newSale);
            
            echo json_encode( $response );
    		exit;
        }
    }

    if (isset($_REQUEST['getAllSales'])) {
        $data = json_decode($_POST['getAllSales'], true);
       
        $class = '\App\Services\\'.ucfirst($data['classname']).'Services';        
        $method = (string) $data['method'];
        
        if (class_exists($class) && method_exists($class, $method)) {
            $response = call_user_func( array( new $class, $method) );
            
            echo json_encode( $response );
    		exit;
        }
    }

} catch(Exception $error) {
      
    echo json_encode( array('status' => 'error', 'data' => $error->getMessage(), JSON_UNESCAPED_UNICODE) );
}


