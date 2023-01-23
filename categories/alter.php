<?php 
    include( '../Category.php' ); 
?>

<h1>
    Alterar
</h1>

<?php
    if( isset( $_GET['id'] ) ) {
        $id = $_GET['id'];
        $categories = new Category();  
        $category = $categories->find( $id );
    }
?>

<?php if( $category ) : ?>
    <form
    method="POST"
    action="">
        <div style="display:flex;flex-direction:column">
            <label style="margin-bottom:.5rem;display:flex;flex-direction:column" for="nome">
                Nome:

                <input type="text" name="nome" id="nome" placeholder="Nome" value="<?php echo $category[0]->nome; ?>">
            </label>   

            <label style="margin-bottom:.5rem;display:flex;flex-direction:column" for="descricao">
                Descrição:

                <textarea name="descricao" id="descricao" cols="30" rows="10"><?php echo $category[0]->descricao; ?></textarea>
            </label>

            <input type="submit" value="Salvar">
        </div>
    </form>
<?php else : ?>
    <p>
        Nenhuma categoria encontrada!
    </p>
<?php endif; ?>

<?php
    if( isset( $_POST['nome'] ) && isset( $_POST['descricao'] ) ) {
        $categories->setNome( $_POST['nome'] );
        $categories->setDescricao( $_POST['descricao'] );
        $categories->update($category[0]->id); 
    }
?>