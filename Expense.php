<?php
require_once 'Crud.php';

class Expense extends Crud {
	protected $table = 'despesas';
	public $valor;
	public $data_compra;
	public $descricao;
	public $tipo_pagamento_id;
	public $categoria_id;

	// public function __construct( $valor, $data_compra, $descricao, $tipo_pagamento_id, $categoria_id ) {
	// 	$this->valor = $valor;
	// 	$this->data_compra = $data_compra;
	// 	$this->descricao = $descricao;
	// 	$this->tipo_pagamento_id = $tipo_pagamento_id;
	// 	$this->categoria_id = $categoria_id;
	// }

	public function getValor(){
		return $this->valor;
	}

	public function getDataCompra(){
		return $this->data_compra;
	}

	public function getDescricao(){
		return $this->descricao;
	}
	
	public function getTipoPagamentoId(){
		return $this->tipo_pagamento_id;
	}

	public function getCategoriaId(){
		return $this->categoria_id;
	}

	public function setValor($valor){
		$this->valor = $valor;
	}

	public function setDataCompra($data_compra){
		$this->data_compra = $data_compra;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function setTipoPagamentoId($tipo_pagamento_id){
		$this->tipo_pagamento_id = $tipo_pagamento_id;
	}

	public function setCategoriaId($categoria_id){
		$this->categoria_id = $categoria_id;
	}

	public function update( $id ) { return true; }

	public function create() {
		$sql  = "INSERT INTO $this->table (valor, data_compra, descricao, tipo_pagamento_id, categoria_id) VALUES (:valor, :data_compra, :descricao, :tipo_pagamento_id, :categoria_id)";
		$stmt = DB::prepare( $sql );
		$stmt->bindParam( ':valor', $this->valor );
		$stmt->bindParam( ':data_compra', $this->data_compra );
		$stmt->bindParam( ':descricao', $this->descricao );
		$stmt->bindParam( ':tipo_pagamento_id', $this->tipo_pagamento_id );
		$stmt->bindParam( ':categoria_id', $this->categoria_id );
		return $stmt->execute(); 
	}

	public function store() {
		$sql = "SELECT * FROM despesas AS despesa JOIN tipo_pagamento AS tipo JOIN categorias AS categoria WHERE despesa.tipo_pagamento_id = tipo.id AND despesa.categoria_id = categoria.id";
		$stmt = DB::prepare( $sql );
		$stmt->execute();
		return $stmt->fetchAll();
	}
	
	public function find( $id ) {
		// $sql  = "SELECT * FROM $this->table WHERE id = :id";
		// $sql = "SELECT * FROM despesas AS despesa INNER JOIN tipo_pagamento AS tipo ON despesa.tipo_pagamento_id = tipo.id INNER JOIN categorias AS categoria ON despensa.categoria_id = categoria.id";
		$sql = "SELECT * FROM despesas AS despesa, descricao AS descricao_despensa JOIN tipo_pagamento AS tipo JOIN categorias AS categoria WHERE despesa.id = :id AND despesa.tipo_pagamento_id = tipo.id AND despesa.categoria_id = categoria.id";
		$stmt = DB::prepare( $sql );
		$stmt->bindParam( ':id', $id, PDO::PARAM_INT );
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