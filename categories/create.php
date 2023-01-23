<?php 
    include( '../includes/header.php' ); 
    include( '../Category.php' ); 
?>

<h1>
    Categorias
</h1>

<form method="POST">
    <div style="display:flex;flex-direction:column">
        <label style="margin-bottom:.5rem;display:flex;flex-direction:column" for="nome">
            Nome: 

            <input type="text" name="nome" id="nome" placeholder="Nome">
        </label>

        <label style="margin-bottom:.5rem;display:flex;flex-direction:column" for="descricao">
            Descrição:
            
            <textarea name="descricao" id="descricao" cols="30" rows="10" placeholder="Descrição"></textarea>
        </label>    

        <input type="submit" value="Salvar">
    </div>
</form>

<?php
    if( isset( $_POST['nome'] ) && isset( $_POST['descricao'] ) ) :
        $category = new Category();
        $category->setNome( $_POST['nome'] );
        $category->setDescricao( $_POST['descricao'] );
        $category->create(); 
    endif;
?>

<?php include( '../includes/footer.php' ); ?>