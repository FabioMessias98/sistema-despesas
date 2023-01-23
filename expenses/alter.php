<?php 
    include( '../Expense.php' ); 
    include( '../TypesPayment.php' ); 
    include( '../Category.php' ); 
?>

<h1>
    Alterar
</h1>

<?php
    if( isset( $_GET['id'] ) ) {
        $id = $_GET['id'];
        $expenses = new Expense();  
        $expense = $expenses->find( $id );
    }
?>

<?php if( $expense ) : ?>
    <form
    method="POST"
    action="">
        <div style="display:flex;flex-direction:column">
            <label style="margin-bottom:.5rem;display:flex;flex-direction:column" for="valor">
                Valor:

                <input type="text" name="valor" id="valor" placeholder="Valor" value="<?php echo $expense[0]->valor; ?>">
            </label>

            <label style="margin-bottom:.5rem;display:flex;flex-direction:column" for="data_compra">
                Data da compra:

                <input type="date" name="data_compra" id="data_compra" placeholder="Data da compra" value="<?php echo $expense[0]->data_compra; ?>">
            </label>    

            <label style="margin-bottom:.5rem;display:flex;flex-direction:column" for="descricao">
                Descrição:

                <textarea name="descricao" id="descricao" cols="30" rows="10"><?php echo $expense[0]->descricao_despesa; ?></textarea>
            </label>

            <label style="margin-bottom:.5rem;display:flex;flex-direction:column" for="tipo_pagamento">
                Tipo de pagamento:

                <?php $types_payment = new TypesPayment(); ?>

                <select name="tipo_pagamento" id="tipo_pagamento">
                    <option value="<?php echo $expense[0]->id_tipo; ?>"><?php echo $expense[0]->tipo; ?></option>

                    <?php foreach( $types_payment->findAll() as $type_payment ) : ?>
                        <option value="<?php echo $type_payment->id; ?>"><?php echo $type_payment->tipo; ?></option>  
                    <?php endforeach; ?>
                </select>
            </label>

            <label style="margin-bottom:.5rem;display:flex;flex-direction:column" for="categoria">
                Categoria:

                <?php $categories = new Category(); ?>
                
                <select name="categoria" id="categoria">
                    <option value="<?php echo $expense[0]->id_categoria; ?>"><?php echo $expense[0]->nome; ?></option>

                    <?php foreach( $categories->findAll() as $category ) : ?>
                        <option value="<?php echo $category->id; ?>"><?php echo $category->nome; ?></option>
                    <?php endforeach; ?>
                </select>
            </label>

            <input type="submit" value="Salvar">
        </div>
    </form>
<?php else : ?>
    <p>
        Nenhuma despesa encontrada!
    </p>
<?php endif; ?>

<?php
    if( isset( $_POST['valor'] ) && isset( $_POST['data_compra'] ) && isset( $_POST['descricao'] ) && isset( $_POST['tipo_pagamento'] ) && isset( $_POST['categoria'] ) ) {
        $expenses->setValor( $_POST['valor'] );
        $expenses->setDataCompra( $_POST['data_compra'] );
        $expenses->setDescricao( $_POST['descricao'] );
        $expenses->setTipoPagamentoId( $_POST['tipo_pagamento'] );
        $expenses->setCategoriaId( $_POST['categoria'] );
        $expenses->update($expense[0]->id_despesa); 
        header( 'Location: ../index.php' );
    }
?>