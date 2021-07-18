<?php
header('Content-Type: application/json');
require "../vendor/autoload.php";

try {
   

    if (isset($_REQUEST)) {
        $data = json_decode($_POST['seller'], true);
        
        $class = '\App\Services\\'.ucfirst($data['classname']).'Services';        
        $method = (string) $data['method'];
        
        $newSeller = array( 'nome' => $data['nome'], 'email' => $data['email']);

        if (class_exists($class) && method_exists($class, $method)) {
            $response = call_user_func_array( array( new $class, $method ), array($newSeller) );
            $response_json = array('status' => 'success', 'message' => 'Vendedor cadastrado com sucesso', 'data' => $response);
            
            echo json_encode( $response_json );
    		exit;
        }

    }

} catch(Exception $error) {
      
    echo json_encode( array('status' => 'error', 'data' => $error->getMessage(), JSON_UNESCAPED_UNICODE) );
}
