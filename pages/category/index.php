<?php
    include( '../../includes/header.php' );
    include( '../../Category.php' ); 
?>

<section class="d-flex flex-wrap">

    <?php include( '../../includes/sidebar.php' ); ?>

    <div class="col-9 pt-5">

        <div class="row justify-content-end">

            <div class="col-2">
                <a 
                class="l-expense__report py-2"
                href="create.php">
                    Nova categoria
                </a>
            </div>
        </div>

        <div class="mt-5 pt-5">

            <h4 class="u-font-weight-bold text-center mb-5">
                Lista de categorias
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
                            Categoria
                        </p>
                    </div>

                    <div class="col">
                        <p class="u-font-size-14 u-font-weight-bold text-center">
                            Descrição
                        </p>
                    </div>

                    <div class="col-2"></div>
                </div>
            </div>

            <!-- loop -->
            <?php 
                $categories = new Category();

                foreach( $categories->store() as $category ) : 
            ?>
                    <div class="col-12 mb-3">

                        <div class="row">

                            <div class="col-1">

                                <div class="l-expense__box">
                                    <p class="u-font-size-12 u-font-weight-bold u-font-style-italic text-center mb-0 py-2">
                                        <?php echo '#' . $category->id; ?>
                                    </p>
                                </div>
                            </div>

                            <div class="col">

                                <div class="l-expense__box">
                                    <p class="u-font-size-14 text-center mb-0 py-2">
                                        <?php echo $category->nome; ?>
                                    </p>
                                </div>
                            </div>

                            <div class="col">

                                <div class="l-expense__box">
                                    <p class="u-font-size-14 text-center mb-0 py-2">
                                        <?php echo $category->descricao; ?>
                                    </p>
                                </div>
                            </div>

                            <div class="col-1">

                                <div>
                                    <a 
                                    class="l-expense__box__action l-expense__box__action--edit u-font-weight-bold text-center mb-0 py-2"
                                    href="alter.php?id=<?php echo $category->id; ?>">
                                        Editar
                                    </a>
                                </div>
                            </div>

                            <div class="col-1">

                                <div>
                                    <a 
                                    class="l-expense__box__action l-expense__box__action--remove u-font-weight-bold text-center mb-0 py-2"
                                    href="delete.php/?id=<?php echo $category->id; ?>">
                                        Remover
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php    
                endforeach; 
            ?>
            <!-- end loop -->
        </div>
    </div>
</section>

<?php include( '../../includes/footer.php' ); ?>