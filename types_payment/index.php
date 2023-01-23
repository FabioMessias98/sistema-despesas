<?php include( '../includes/header.php' ); ?>

<?php 
    $title_single = 'Pagamento'; 
    $title_plural = 'Pagamentos';
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
<?php for( $i = 0; $i < 10; $i++ ) { ?>
    <div style="margin-bottom:.1rem;display:flex;justify-content:space-between">
        <p>
            <?php echo $title_single . ' ' . $i; ?>
        </p>

        <a href="#">
            Editar
        </a>

        <a href="#">
            Deletar
        </a>
    </div>
<?php } ?>
<!-- end loop -->

<?php include( '../includes/footer.php' ); ?>