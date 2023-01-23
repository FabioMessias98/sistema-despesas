<?php
	require_once 'Crud.php';

	class TypesPayment extends Crud {
		protected $table = 'tipo_pagamento';
		private $id;
		private $tipo;
		
		public function getId(){
			return $this->id;
		}
		
		public function getTipo(){
			return $this->tipo;
		}

		public function setId($id){
			$this->id = $id;
		}
		
		public function setTipo($tipo){
			$this->tipo = $tipo;
		}

		public function create(){
			$sql  = "INSERT INTO $this->table (tipo) VALUES (:tipo)";
			$stmt = DB::prepare( $sql );
			$stmt->bindParam( ':tipo', $this->tipo );

			return $stmt->execute(); 
		}
		
		public function update($id){
			$sql  = "UPDATE $this->table SET tipo = :tipo WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':tipo', $this->nome);
			$stmt->bindParam(':id', $id);
			return $stmt->execute();	
		}

		// public function recover(){
		//     $sql  = "Select * from $this->table where email =:email AND senha = :senha";
		// 	$stmt = DB::prepare($sql);
		// 	$stmt->bindParam(':email', $this->email);
		// 	$stmt->bindParam(':senha', $this->senha);
		// 	$stmt->execute(); 
		// 	return $stmt->fetchAll();
		// }
		
		// public function resetPassword(){
		//     $sql  = "UPDATE $this->table SET  senha = :senha WHERE id = :id";
		//     $stmt = DB::prepare($sql);
		//     $stmt->bindParam(':senha', $this->senha);
		//     $stmt->bindParam(':id', $this->id);
		//     return $stmt->execute();
		// }
		
	}

?>