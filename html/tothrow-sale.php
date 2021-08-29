      <?php require 'include/header.php'; ?>

         <div class="form-title">
            <h3><span> Lançar </span>  Venda </h3>
         </div>

         <div class="flexrow">
             <form action="" method="POST">
                <div >
                    <label for="">Lançar uma venda</label>
                    <select name="id" id="selectedseller" class="form-control">
                       
                    </select>
                </div>

                 <div >
                   <label for="">Valor da Venda</label>
                    <input type="text" name="value_sale" class="form-control" onchange="formatMoney(this)" placeholder="Informe o valor da venda">
                 </div>
                 
                 <button type="submit" name="lancar-venda" id="newsale" >Lançar Venda</button>
             </form>
         </div>
     </div>

    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" ></script>
    <script src="static/js/request.js"></script>

 
</body>
</html>



