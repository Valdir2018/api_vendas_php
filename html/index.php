     <?php  require 'include/header.php';  ?>
    
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



