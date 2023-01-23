<?php
	require_once 'Crud.php';

	class ApiExpense extends Crud {
		protected $table = 'despesas';
		private $data;

		public function __construct( $data ) {
			$this->data = $data;
		}

		public function create() {
			foreach( $this->data as $expense ) :
				$sql  = "INSERT INTO $this->table (valor, data_compra, descricao, tipo_pagamento_id, categoria_id) VALUES (:valor, :data_compra, :descricao, :tipo_pagamento_id, :categoria_id)";
				$stmt = DB::prepare( $sql );
				$stmt->bindParam( ':valor', $expense->valor );
				$stmt->bindParam( ':data_compra', $expense->data_compra );
				$stmt->bindParam( ':descricao', $expense->descricao );
				$stmt->bindParam( ':tipo_pagamento_id', $expense->tipo_pagamento_id );
				$stmt->bindParam( ':categoria_id', $expense->categoria_id );
				$stmt->execute(); 
			endforeach;
		}
	}

?>