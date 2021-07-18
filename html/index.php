<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tray - Plataforma de e-commerce integrada</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="static/css/style.css">

</head>
 <body>

    <header>
      <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href="#">
            <img src="static/image/logo-header.svg" alt="">
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
                <li><a href="">criar vendedor </a></li> 
                <li><a href="vendedores.php?action=list" id="list_sellers">listar vendedores </a></li> 
                <li><a href="">lançar uma venda </a></li> 
                <li><a href="">listar vendas </a></li> 
             </ul>
         </div> 
          
        <form action="" method="POST">
            <div class="form-title">
                <h3><span> Cadastrar </span> vendedor</h3>
            </div>
            <div class="form-group">
                <label for="name_vendedor">Nome do vendedor</label>
                <input type="text" class="form-control" id="name_vendedor" name="nome" aria-describedby="Informe o nome do vendedor" placeholder="Informe o nome do vendedor" />
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="email_vendedor">E-mail</label>
                <input type="email" class="form-control" id="email_vendedor" name="email" placeholder="E-mail do vendedor" />
            </div>
            <button type="submit" id="add" class="btn btn-primary customer-button">CADASTRAR</button>
        </form>
     </div>

    


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" ></script>

    <script src="static/js/request.js"></script>
    



</body>
</html>



