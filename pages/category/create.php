<?php 
    include( '../../includes/header.php' ); 
    include( '../../Category.php' ); 
?>

<section class="py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-8">

                <h1 class="u-font-weight-bold text-center mb-4">
                    Criar
                </h1>

                <form 
                method="POST"
                action="">

                    <div class="row">

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
                            id="nome">
                        </div>

                        <div class="col-12 mt-3">
                            <label
                            class="u-font-weight-bold"
                            for="descricao">
                                Descrição:
                            </label>

                            <textarea class="c-input-field py-2 px-4" type="date" name="descricao" id="descricao"></textarea>
                        </div>

                        <div class="col-4 mt-4">
                            <a
                            class="c-button-submit text-center text-decoration-none py-2"
                            href="index.php">
                                Voltar
                            </a>
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
        </div>
    </div>
</section>

<?php
    if( isset( $_POST['nome'] ) && isset( $_POST['descricao'] ) ) {
        $category = new Category();
        $category->setNome( $_POST['nome'] );
        $category->setDescricao( $_POST['descricao'] );
        $category->create(); 
        header('Refresh:0');
    }
    
    include( '../../includes/footer.php' ); 
?>