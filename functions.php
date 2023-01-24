<?php
    function get_format_month( $month ) {
        $months = array(
            '01' => 'Janeiro',
            '02' => 'Fevereiro',
            '03' => 'Março',
            '04' => 'Abril',
            '05' => 'Maio',
            '06' => 'Junho',
            '07' => 'Julho',
            '08' => 'Agosto',
            '09' => 'Setembro',
            '10' => 'Outubro',
            '11' => 'Novembro',
            '12' => 'Dezembro'
        );

        foreach( $months as $key => $value ) {
            if( $month == $key )
                return $value;  
        }
    }

    function get_format_date( $date ) {
        list( $data_year, $data_month, $data_day) = explode('-', $date );    

        return $data_day . '/' . $data_month . '/' . $data_year;
    }
?>