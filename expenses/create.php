<?php 
    include( '../includes/header.php' ); 
    include( '../Category.php' );
    include( '../TypesPayment.php' );
    include( '../Expenses.php' );
?>

<h1>
    Despesa
</h1>

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
                <!-- endforeach; -->
                <!-- <option value="Débito">Débito</option>
                <option value="Crédito">Crédito</option>
                <option value="Pix">Pix</option> -->
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
    if( isset( $_POST['valor']) && isset( $_POST['data_compra'] ) && isset( $_POST['descricao'] ) && isset( $_POST['tipo_pagamento'] ) && isset( $_POST['categoria'] ) ) {
        $expenses = new Expenses();

        $expenses->setValor( $_POST['valor'] );
        $expenses->setDataCompra( $_POST['data_compra'] );
        $expenses->setDescricao( $_POST['descricao'] );
        $expenses->setTipoPagamentoId( $_POST['tipo_pagamento'] );
        $expenses->setCategoriaId( $_POST['categoria'] );
        $expenses->create();
    } 
?>

<?php include( '../includes/footer.php' ); ?>