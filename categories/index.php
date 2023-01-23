<?php
    include( '../includes/header.php' );
    include( '../Category.php' ); 
?>

<?php 
    $title_single = 'Categoria'; 
    $title_plural = 'Categorias';
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
    $categories = new Category();

    foreach( $categories->findAll() as $category ) : 
?>
    <div style="margin-bottom:.1rem;display:flex;justify-content:space-between">
        <p>
            <?php echo $category->id; ?>
        </p>
        
        <p>
            <?php echo $category->nome; ?>
        </p>

        <a href="alter.php/?id=<?php echo $category->id; ?>">
            Editar
        </a>

        <a href="delete.php/?id=<?php echo $category->id; ?>">
            Deletar
        </a>
    </div>
<?php endforeach; ?>
<!-- end loop -->

<?php include( '../includes/footer.php' ); ?>