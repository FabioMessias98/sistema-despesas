<?php 
    include( '../../includes/header.php' ); 
    include( '../../Category.php' ); 

    if( isset( $_GET['id'] ) ) {
        $id = $_GET['id'];
        $categories = new Category();  
        $category = $categories->find( $id );
    }
?>

<?php if( $category ) : ?>
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

                            <div class="col-12">
                                <label
                                class="u-font-weight-bold"
                                for="nome">
                                    Nome:
                                </label>

                                <input 
                                class="c-input-field py-2 px-4" 
                                type="text" 
                                name="nome" 
                                id="nome"
                                value="<?php echo $category[0]->nome; ?>">
                            </div>

                            <div class="col-12 mt-3">
                                <label
                                class="u-font-weight-bold"
                                for="descricao">
                                    Descrição:
                                </label>

                                <textarea class="c-input-field py-2 px-4" type="date" name="descricao" id="descricao"><?php echo $category[0]->descricao; ?></textarea>
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
            Nenhuma categoria encontrada!
        </h3>   
    </div>
<?php endif; ?>

<?php
    if( isset( $_POST['nome'] ) && isset( $_POST['descricao'] ) ) {
        $categories->setNome( $_POST['nome'] );
        $categories->setDescricao( $_POST['descricao'] );
        $categories->getNome();
        $categories->update($category[0]->id); 
        header('Refresh:0');
    }
?>