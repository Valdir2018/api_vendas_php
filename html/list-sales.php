<?php

    require '../vendor/autoload.php';
    require 'include/header.php';
?>

         <div class="form-title">
            <h3><span> Listar </span>  Vendas</h3>
            <select  id="data" class="form-control sales">
               <option >SELECIONE UM VENDEDOR</option> 
            </select>
         </div>

         <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Comissão</th>
                    <th scope="col">Valor Venda</th>
                    <th scope="col">Data Venda</th>
                  
                </tr>
            </thead>
            <tbody id="tbodydatasales">
              
            </tbody>
          </table>

          <div class="flex-report">
             <form action="POST">
                <button type="submit" class="reportid" name="report" id="report">Enviar Relatório</button>
             </form>
            <div  id="add_message" style=" display:flex; margin: 15px 74px"></div>
          </div>
     
     </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" ></script>
    <script src="static/js/request.js"></script>

 
</body>
</html>



