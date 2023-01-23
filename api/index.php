<?php 
    session_start();
    $status = $_SESSION[ 'status' ];

    include( '../includes/header.php' ); 
    include( '../ApiExpense.php' );
    include( '../Expense.php' );  
    include( '../TypesPayment.php' );
    include( '../Category.php' );
    
    $api_expenses = file_get_contents( '../api/expenses.json', true);
    $data = json_decode( $api_expenses );

    if( !$status ) {
        $expenses_api = new ApiExpense( $data );
        $expenses_api->create();
        $_SESSION[ 'status' ] = true;
    }
?>

<div>
    <form
    method="POST"
    action="">
        <div style="display:flex;flex-direction:column">
            <label style="margin-bottom:.5rem;display:flex;flex-direction:column" for="valor">
                Valor:

                <input type="text" name="valor" id="valor" placeholder="Valor">
            </label>

            <label style="margin-bottom:.5rem;display:flex;flex-direction:column" for="data_compra">
                Data da compra:

                <input type="date" name="data_compra" id="data_compra" placeholder="Data da compra">
            </label>    

            <label style="margin-bottom:.5rem;display:flex;flex-direction:column" for="descricao">
                Descrição:

                <textarea name="descricao" id="descricao" cols="30" rows="10" placeholder="Descrição"></textarea>
            </label>

            <label style="margin-bottom:.5rem;display:flex;flex-direction:column" for="tipo_pagamento">
                Tipo de pagamento:

                <?php $types_payment = new TypesPayment(); ?>

                <select name="tipo_pagamento" id="tipo_pagamento">
                    <option >Selecionar</option>

                    <?php foreach( $types_payment->findAll() as $type_payment ) : ?>
                        <option value="<?php echo $type_payment->id; ?>"><?php echo $type_payment->tipo; ?></option>  
                    <?php endforeach; ?>
                </select>
            </label>

            <label style="margin-bottom:.5rem;display:flex;flex-direction:column" for="categoria">
                Categoria:

                <?php $categories = new Category(); ?>
                
                <select name="categoria" id="categoria">
                    <option >Selecionar</option>

                    <?php foreach( $categories->findAll() as $category ) : ?>
                        <option value="<?php echo $category->id; ?>"><?php echo $category->nome; ?></option>
                    <?php endforeach; ?>
                </select>
            </label>

            <input type="submit" value="Salvar">
        </div>
    </form>

    <?php 
        if( isset( $_POST['valor'] ) && isset( $_POST['data_compra'] ) && isset( $_POST['descricao'] ) && isset( $_POST['tipo_pagamento'] ) && isset( $_POST['categoria'] ) ) {
            // $expenses = new Expense( $_POST['valor'], $_POST['data_compra'], $_POST['descricao'], $_POST['tipo_pagamento'], $_POST['categoria'] );
            $expenses = new Expense();
            $expenses->setValor( $_POST['valor'] );
            $expenses->setDataCompra( $_POST['data_compra'] );
            $expenses->setDescricao( $_POST['descricao'] );
            $expenses->setTipoPagamentoId( $_POST['tipo_pagamento'] );
            $expenses->setCategoriaId( $_POST['categoria'] );
            $expenses->create();
        }
    ?>
</div>

<div style="height:200px"></div>

<div style="display:flex;flex-wrap">

    <div style="width:14%">
        <p style="font-weight:bold;text-align:center">
            Valor
        </p>
    </div>

    <div style="width:14%">
        <p style="font-weight:bold;text-align:center">
            Data de compra
        </p>
    </div>

    <div style="width:14%">
        <p style="font-weight:bold;text-align:center">
            Descrição
        </p>
    </div>

    <div style="width:14%">
        <p style="font-weight:bold;text-align:center">
            Tipo de pagamento
        </p>
    </div>

    <div style="width:14%">
        <p style="font-weight:bold;text-align:center">
            Categoria
        </p>
    </div>

    <div style="width:28%">
        <p style="font-weight:bold;text-align:center">
            Ações
        </p>
    </div>
</div>

<div style="display:flex;flex-wrap:wrap">

    <!-- loop -->
    <?php 
        $expenses = new Expense();
                        
        foreach( $expenses->store() as $expense ) :              
    ?>
        <div style="width:100%;display:flex;flex-wrap:wrap">

            <div style="width:14%">
                <p style="text-align:center">
                    <?php echo $expense->valor; ?>
                </p>
            </div>

            <div style="width:14%">
                <p style="text-align:center">
                    <?php echo $expense->data_compra; ?>
                </p>
            </div>

            <div style="width:14%">
                <p style="text-align:center">
                    <?php echo $expense->descricao; ?>
                </p>
            </div>

            <div style="width:14%">
                <p style="text-align:center">
                    <?php echo $expense->tipo; ?>
                </p>
            </div>

            <div style="width:14%">
                <p style="text-align:center">
                    <?php echo $expense->nome; ?>
                </p>
            </div>

            <div style="width:14%">
                <a 
                style="display:block;text-align:center"
                href="/edit.php">
                    Editar
                </a>
            </div>

            <div style="width:14%">
                <a 
                style="display:block;text-align:center"
                href="#">
                    Excluir
                </a>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- end loop -->
</div>

<?php include( '../includes/footer.php' ); ?>