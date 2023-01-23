<?php
require_once 'Crud.php';

class Expense extends Crud {
	protected $table = 'despesas';
	public $data;

	function __construct( $data ) {
		$this->data = $data;
	}	
	public function update($id) { return true; }

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

	public function store() {
		$sql = "SELECT * FROM despesas AS despesa JOIN tipo_pagamento AS tipo WHERE despesa.tipo_pagamento_id = tipo.id";
		$stmt = DB::prepare( $sql );
		$stmt->execute();
		return $stmt->fetchAll();
	}
	
	
	// public function update($id) {
	// 	$sql  = "UPDATE $this->table SET nome = :nome, descricao = :descricao WHERE id = :id";
	// 	$stmt = DB::prepare( $sql );
	// 	$stmt->bindParam( ':nome', $this->nome );
	// 	$stmt->bindParam( ':descricao', $this->descricao );
	// 	$stmt->bindParam( ':id', $id );
	// 	return $stmt->execute();	
	// }

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