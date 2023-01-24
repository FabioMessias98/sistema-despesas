<?php 
    include( '../../includes/header.php' ); 
    include( '../../Expense.php' ); 
    include( '../../TypesPayment.php' ); 
    include( '../../Category.php' ); 
?>

<?php
    if( isset( $_GET['id'] ) ) {
        $id = $_GET['id'];
        $expenses = new Expense();  
        $expense = $expenses->find( $id );
    }
?>

<?php if( $expense ) : ?>

    <section class="py-5">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-8">

                    <h1 class="u-font-weight-bold text-center mb-4">
                        Alterar
                    </h1>

                    <form 
                    method="POST"
                    action="">

                        <div class="row justify-content-between">

                            <div class="col-6">
                                <label
                                class="u-font-weight-bold"
                                for="valor">
                                    Valor:
                                </label>
                                
                                <div class="position-relative d-flex">
                                    <p class="c-input-field__cash d-flex align-items-center u-font-weight-bold mb-0 mr-1">
                                        R$
                                    </p>

                                    <input 
                                    class="c-input-field py-2 pl-5 pr-4" 
                                    type="text" 
                                    name="valor" 
                                    id="valor"
                                    placeholder="0,00"
                                    value="<?php echo $expense[0]->valor; ?>">
                                </div>
                            </div>

                            <div class="col-6">
                                <label
                                class="u-font-weight-bold"
                                for="data_compra">
                                    Data da compra:
                                </label>

                                <input 
                                class="c-input-field py-2 px-4" 
                                type="date" 
                                name="data_compra" 
                                id="data_compra"
                                value="<?php echo $expense[0]->data_compra; ?>">
                            </div>

                            <div class="col-12 mt-3">
                                <label
                                class="u-font-weight-bold"
                                for="descricao">
                                    Descrição:
                                </label>

                                <textarea class="c-input-field py-2 px-4" type="date" name="descricao" id="descricao"><?php echo $expense[0]->descricao_despesa; ?></textarea>
                            </div>

                            <div class="col-6 mt-3">
                                <label class="u-font-weight-bold">
                                    Tipo de pagamento:
                                </label>

                                <?php $types_payment = new TypesPayment(); ?>

                                <select class="c-input-field py-2 px-4" name="tipo_pagamento" id="tipo_pagamento">
                                    <option value="<?php echo $expense[0]->id_tipo; ?>"><?php echo $expense[0]->tipo; ?></option>

                                    <?php foreach( $types_payment->store() as $type_payment ) : ?>
                                        <option value="<?php echo $type_payment->id; ?>"><?php echo $type_payment->tipo; ?></option>  
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-6 mt-3">

                                <label class="u-font-weight-bold">
                                    Categoria:
                                </label>
                                
                                <?php $categories = new Category(); ?>
                                    
                                <select class="c-input-field py-2 px-4" name="categoria" id="categoria">
                                    <option value="<?php echo $expense[0]->id_categoria; ?>"><?php echo $expense[0]->nome; ?></option>

                                    <?php foreach( $categories->store() as $category ) : ?>
                                        <option value="<?php echo $category->id; ?>"><?php echo $category->nome; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-4 mt-4">
                                <input
                                class="c-button-submit py-2"
                                type="submit"
                                value="Editar">
                            </div>

                            <div class="col-4 mt-4">
                                <a
                                class="c-button-submit text-center text-decoration-none py-2"
                                href="../index.php">
                                    Voltar
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php else : ?>
    <div 
    class="d-flex justify-content-center align-items-center"
    style="width:100%;height:100vh">
        <h3 class="u-font-weight-bold">
            Nenhuma despesa encontrada!
        </h3>   
    </div>
<?php endif; ?>

<?php
    if( isset( $_POST['valor'] ) && isset( $_POST['data_compra'] ) && isset( $_POST['descricao'] ) && isset( $_POST['tipo_pagamento'] ) && isset( $_POST['categoria'] ) ) {
        $expenses->setValor( $_POST['valor'] );
        $expenses->setDataCompra( $_POST['data_compra'] );
        $expenses->setDescricao( $_POST['descricao'] );
        $expenses->setTipoPagamentoId( $_POST['tipo_pagamento'] );
        $expenses->setCategoriaId( $_POST['categoria'] );
        $expenses->update($expense[0]->id_despesa); 
        header('Refresh:0');
    }
?>

<?php include( '../../includes/footer.php' ); ?>