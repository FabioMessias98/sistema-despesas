<?php 
    include( '../includes/header.php' ); 
    include( '../Expenses.php' );    
?>

<?php 
    $title_single = 'Despesa'; 
    $title_plural = 'Despesas';
?>

<h2>
    Criar novo
</h2>

<a href="create.php">
    Criar <?php echo $title_single; ?>
</a>

<br>
<hr>
<br>

<h2>
    Listar <?php echo $title_plural; ?>
</h2>

<div style="display:flex;flex-wrap:wrap">

    <div style="width:16%">
        <p style="font-weight:700">
            ID
        </p>
    </div>

    <div style="width:16%">
        <p style="font-weight:700">
            Valor
        </p>
    </div>

    <div style="width:16%">
        <p style="font-weight:700">
            Data de compra
        </p>
    </div>

    <div style="width:16%">
        <p style="font-weight:700">
            Descrição
        </p>
    </div>

    <div style="width:16%">
        <p style="font-weight:700">
            Tipo de pagamento
        </p>
    </div>

    <div style="width:16%">
        <p style="font-weight:700">
            Categoria
        </p>
    </div>
</div>

<!-- loop -->
<?php 
    $expenses = new Expenses();
    date_default_timezone_set('UTC');
    foreach( $expenses->findAll() as $expense ) : 
?>
        <div style="margin-bottom:.1rem;display:flex;justify-content:space-between">
            <div style="width:20%">
                <?php echo $expense->id; ?>
            </div>

            <div style="width:20%">
                <?php echo $expense->valor; ?>
            </div>

            <div style="width:20%">
                <?php echo $expense->data_compra; ?>
            </div>

            <div style="width:20%">
                <?php echo $expense->descricao; ?>
            </div>

            <div style="width:20%">
                <?php echo $expense->tipo_pagamento_id; ?>
            </div>

            <div style="width:20%">
                <?php echo $expense->categoria_id; ?>
            </div>

            <a href="#">
                Editar
            </a>

            <a href="#">
                Deletar
            </a>
        </div>
<?php 
    endforeach; 
?>
<!-- end loop -->

<?php include( '../includes/footer.php' ); ?>