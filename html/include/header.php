<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Api PHP </title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="static/css/style.css">
</head>
 <body>

    <header>
      <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href="#">
            <img src="static/image/logoipsum-logo-7.svg" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Planos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Marketplaces</a>
                </li>
            </ul>
         </div>
       </nav>
     </header> 

     <div class="container">
     <div class="submenu">
        <ul>
             <li><a href="index.php">criar vendedor </a></li> 
             <li><a href="list-seler.php?action=list" id="list_sellers">listar vendedores </a></li> 
             <li><a href="tothrow-sale.php?action=sale">lançar uma venda </a></li> 
             <li><a href="list-sales.php?action=allsales">listar vendas </a></li> 
        </ul>
    </div> 
