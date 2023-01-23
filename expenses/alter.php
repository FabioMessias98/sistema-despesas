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
        echo "<pre>";
        var_dump($expense);
        echo "</pre>";
    } else {
        echo 'Error!';
    }
?>

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

                <textarea name="descricao" id="descricao" cols="30" rows="10"><?php echo $expense[0]->descricao; ?></textarea>
            </label>

            <label style="margin-bottom:.5rem;display:flex;flex-direction:column" for="tipo_pagamento">
                Tipo de pagamento:

                <?php $types_payment = new TypesPayment(); ?>

                <select name="tipo_pagamento" id="tipo_pagamento">
                    <option><?php echo $expense[0]->tipo; ?></option>

                    <?php foreach( $types_payment->findAll() as $type_payment ) : ?>
                        <option value="<?php echo $type_payment->id; ?>"><?php echo $type_payment->tipo; ?></option>  
                    <?php endforeach; ?>
                </select>
            </label>

            <label style="margin-bottom:.5rem;display:flex;flex-direction:column" for="categoria">
                Categoria:

                <?php $categories = new Category(); ?>
                
                <select name="categoria" id="categoria">
                    <option><?php echo $expense[0]->nome; ?></option>

                    <?php foreach( $categories->findAll() as $category ) : ?>
                        <option value="<?php echo $category->id; ?>"><?php echo $category->nome; ?></option>
                    <?php endforeach; ?>
                </select>
            </label>

            <input type="submit" value="Salvar">
        </div>
    </form>