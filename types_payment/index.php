<?php
    include( '../includes/header.php' );
    include( '../TypesPayment.php' ); 
?>

<?php 
    $title_single = 'Tipo de pagamento'; 
    $title_plural = 'Tipos de pagamentos';
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

<!-- loop -->
<?php 
    $types_payment = new TypesPayment();

    foreach( $types_payment->findAll() as $type_payment ) : 
?>
    <div style="margin-bottom:.1rem;display:flex;justify-content:space-between">
        <p>
            <?php echo $type_payment->id; ?>
        </p>
        
        <p>
            <?php echo $type_payment->tipo; ?>
        </p>

        <a href="alter.php/?id=<?php echo $type_payment->id; ?>">
            Editar
        </a>

        <a href="delete.php/?id=<?php echo $type_payment->id; ?>">
            Deletar
        </a>
    </div>
<?php endforeach; ?>
<!-- end loop -->

<?php include( '../includes/footer.php' ); ?>