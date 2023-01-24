<?php
	require_once 'Crud.php';

	class ApiTypesPayment extends Crud {
		protected $table = 'tipo_pagamento';
		private $data;

		public function __construct( $data ) {
			$this->data = $data;
		}

		public function create() {
			foreach( $this->data as $type_payment ) :
				$sql  = "INSERT INTO $this->table (tipo) VALUES (:tipo)";
				$stmt = DB::prepare( $sql );
				$stmt->bindParam( ':tipo', $type_payment->tipo );
				$stmt->execute(); 
			endforeach;
		}
	}

?>