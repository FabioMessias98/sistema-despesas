<?php include( 'includes/header.php' ); ?>
        <h1>Tela inicial - home</h1>

        <!--
            $content = file_get_contents( 'api.json', true);
            $aContent = json_decode( $content );

            echo "<pre>";
            var_dump($aContent);
            echo "</pre>";

            foreach( $aContent as $item ) :
                echo 'ID: ' . $item->id . '<br>';
                echo 'Nome: ' . $item->nome . '<br><br>';
            endforeach;
        -->

        <!--
            if(isset($_GET['show'])) {
                if($_GET['show'] == 'all') {
                      $content = file_get_contents("api.json",true);
                      echo $content;
                } else {
                      $content = file_get_contents("api.json",true);
                      $aContent = json_decode($content);

                      for ($i=0; $i < count($aContent); $i++) {
                             if($aContent[$i]->id == intval($_GET['show'])){
                                    echo json_encode($aContent[$i]);
                             }
                      }

                      if(!array_key_exists(intval($_GET['show']), $aContent)){
                             echo '[]';
                      }
                }
            }
        -->

        <?php
            $data = json_decode(file_get_contents('api.json'), true);

            if($data != null) {
                   $content = file_get_contents("api.json",true);
                   $aContent = json_decode($content, true);
                   array_push($aContent, $data);
                   file_put_contents("db.json", json_encode($aContent));
                   $updated = file_get_contents("db.json",true);
                   // echo json_encode($aContent);
            } else {
                   echo 'No data received!';
            }
        ?>
        
        
        <a
        style="margin-bottom:1rem;display:block"
        href="expenses">
            Despesas
        </a>

        <a
        style="margin-bottom:1rem;display:block"
        href="categories">
            Categorias
        </a>

        <a
        style="margin-bottom:1rem;display:block"
        href="types_payment">
            Tipos de pagamentos
        </a>
        
        <div style="height:200px"></div>
<?php include( 'includes/footer.php' ); ?>