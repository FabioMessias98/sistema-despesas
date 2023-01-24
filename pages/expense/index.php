<?php 
    session_start();
    $status = $_SESSION[ 'status' ];

    include( '../../includes/header.php' ); 
    include( '../../ApiExpense.php' );
    include( '../../Expense.php' );  
    include( '../../TypesPayment.php' );
    include( '../../Category.php' );
    include( '../../functions.php' );

    $api_expenses = file_get_contents( '../../api/expenses.json', true);
    $data = json_decode( $api_expenses );

    if( !$status ) {
        $expenses_api = new ApiExpense( $data );
        $expenses_api->create();
        $_SESSION[ 'status' ] = true;
    }
?>

    <section class="d-flex flex-wrap">

        <?php include( '../../includes/sidebar.php' ); ?>

        <div class="col-9 pt-5">

            <div class="row">

                <div class="col-6">
                    <h1>
                        <strong>Despesas</strong> - <?php echo get_format_month( date('m') ); ?>
                    </h1>
                </div>

                <div class="col-6">

                    <div class="row justify-content-end">

                        <div class="col-5">
                            <div class="l-expense__report py-2">
                                Gerar relatório

                                <div class="l-expense__report__item">
                                    <a 
                                    class="l-expense__report__item__link py-2"
                                    href="../../report/pdf/">
                                        PDF
                                    </a>

                                    <a 
                                    class="l-expense__report__item__link py-2"
                                    href="../../report/excel/">
                                        Excel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-5">

                <form 
                method="POST"
                action="">

                    <div class="row">

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
                                placeholder="0,00">
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
                            id="data_compra">
                        </div>

                        <div class="col-12 mt-3">
                            <label
                            class="u-font-weight-bold"
                            for="descricao">
                                Descrição:
                            </label>

                            <textarea class="c-input-field py-2 px-4" type="date" name="descricao" id="descricao"></textarea>
                        </div>

                        <div class="col-6 mt-3">
                            <label class="u-font-weight-bold">
                                Tipo de pagamento:
                            </label>

                            <?php $types_payment = new TypesPayment(); ?>

                            <select class="c-input-field py-2 px-4" name="tipo_pagamento" id="tipo_pagamento">
                                <option >Selecionar</option>

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
                                <option >Selecionar</option>

                                <?php foreach( $categories->store() as $category ) : ?>
                                    <option value="<?php echo $category->id; ?>"><?php echo $category->nome; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-4 mt-4">
                            <input
                            class="c-button-submit py-2"
                            type="submit"
                            value="Salvar">
                        </div>
                    </div>
                </form>
            </div>

            <div class="mt-5 pt-5">

                <h4 class="u-font-weight-bold text-center mb-5">
                    Lista das despesas do mês de <?php echo get_format_month(date( 'm' )); ?>
                </h4>
                        
                <div class="col-12">

                    <div class="row">

                        <div class="col-1">
                            <p class="u-font-size-14 u-font-weight-bold text-center">
                                ID
                            </p>
                        </div>

                        <div class="col">
                            <p class="u-font-size-14 u-font-weight-bold text-center">
                                Valor
                            </p>
                        </div>

                        <div class="col">
                            <p class="u-font-size-14 u-font-weight-bold text-center">
                                Data da compra
                            </p>
                        </div>

                        <div class="col">
                            <p class="u-font-size-14 u-font-weight-bold text-center">
                                Descrição
                            </p>
                        </div>

                        <div class="col">
                            <p class="u-font-size-14 u-font-weight-bold text-center">
                                Tipo de pagamento
                            </p>
                        </div>

                        <div class="col">
                            <p class="u-font-size-14 u-font-weight-bold text-center">
                                Categoria
                            </p>
                        </div>

                        <div class="col-2"></div>
                    </div>
                </div>
                <!-- loop -->
                <?php 
                    $expenses = new Expense();
                                    
                    foreach( $expenses->store() as $expense ) :
                        list($data_day, $data_month, $data_year) = explode('-', $expense->data_compra);    
                        if( $data_month == date( 'm' ) ) :         
                ?>
                            <div class="col-12 mb-3">

                                <div class="row">

                                    <div class="col-1">

                                        <div class="l-expense__box">
                                            <p class="u-font-size-12 u-font-weight-bold u-font-style-italic text-center mb-0 py-2">
                                                <?php echo '#' . $expense->id_despesa; ?>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col">

                                        <div class="l-expense__box">
                                            <p class="u-font-size-14 text-center mb-0 py-2">
                                                <?php echo $expense->valor; ?>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col">

                                        <div class="l-expense__box">
                                            <p class="u-font-size-14 text-center mb-0 py-2">
                                                <?php echo get_format_date( $expense->data_compra ); ?>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col">

                                        <div class="l-expense__box">
                                            <p class="u-font-size-14 text-center mb-0 py-2">
                                                <?php echo $expense->descricao_despesa; ?>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col">

                                        <div class="l-expense__box">
                                            <p class="u-font-size-14 text-center mb-0 py-2">
                                                <?php echo $expense->tipo; ?>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col">

                                        <div class="l-expense__box">
                                            <p class="u-font-size-14 text-center mb-0 py-2">
                                                <?php echo $expense->nome; ?>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-1">

                                        <div>
                                            <a 
                                            class="l-expense__box__action l-expense__box__action--edit u-font-weight-bold text-center mb-0 py-2"
                                            href="alter.php/?id=<?php echo $expense->id_despesa; ?>">
                                                Editar
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-1">

                                        <div>
                                            <a 
                                            class="l-expense__box__action l-expense__box__action--remove u-font-weight-bold text-center mb-0 py-2"
                                            href="delete.php/?id=<?php echo $expense->id_despesa; ?>">
                                                Remover
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php   endif;  
                    endforeach; 
                ?>
                <!-- end loop -->
            </div>
        </div>
    </section>

    <?php 
        if( isset( $_POST['valor'] ) && isset( $_POST['data_compra'] ) && isset( $_POST['descricao'] ) && isset( $_POST['tipo_pagamento'] ) && isset( $_POST['categoria'] ) ) {
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

<?php include( '../../includes/footer.php' ); ?>