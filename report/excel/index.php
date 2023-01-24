
<?php 
    include( '../../Expense.php' ); 
    include( '../../functions.php' );
    
    $expenses = new Expense();    
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SIS Despesa - Gerar Excel</title>
    </head>
    <body>
        <?php
            $file = 'despesas.xls';

            $html = "<table border='1'>";
            $html .= '<tr>';
		    $html .= '<td align="center" colspan="6">Mês de ' . get_format_month( date( 'm' ) ) .'</tr>';
		    $html .= '</tr>';
            $html .= "<tr>";
            $html .= "<td>";
            $html .= "ID";
            $html .= "</td>";
            $html .= "<td>";
            $html .= "Valor";
            $html .= "</td>";
            $html .= "<td>";
            $html .= "Data da compra";
            $html .= "</td>";
            $html .= "<td>";
            $html .= "Descricao";
            $html .= "</td>";
            $html .= "<td>";
            $html .= "Tipo";
            $html .= "</td>";
            $html .= "<td>";
            $html .= "Categoria";
            $html .= "</td>";
            $html .= "</tr>";
            
            foreach( $expenses->store() as $expense ) : 
                $html .= "<tr>";
                $html .= "<td>";
                $html .= $expense->id_despesa;
                $html .= "</td>";
                $html .= "<td>";
                $html .= "R$ " . $expense->valor;
                $html .= "</td>";
                $html .= "<td>";
                $html .= $expense->data_compra;
                $html .= "</td>";
                $html .= "<td>";
                $html .= $expense->descricao_despesa;
                $html .= "</td>";
                $html .= "<td>";
                $html .= $expense->tipo;
                $html .= "</td>";
                $html .= "<td>";
                $html .= $expense->nome;
                $html .= "</td>";
                $html .= "</tr>";
            endforeach;
            
            $html .= "</table>";

            echo $html;

            header ( "Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
            header ( "Last-Modified: " . gmdate("D,d M YH:i:s" ) . " GMT" );
            header ( "Cache-Control: no-cache, must-revalidate" );
            header ( "Pragma: no-cache" );
            header ( "Content-type: application/x-msexcel" );
            header ( "Content-Disposition: attachment; filename=\"{$file}\"" );
            header ( "Content-Description: PHP Generated Data" );
		    exit;
        ?>
    </body>
</html>