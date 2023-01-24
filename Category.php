<?php
require_once 'Crud.php';

class Category extends Crud {
	protected $table = 'categorias';
	private $id;
	private $nome;
	private $descricao;
	
	public function getId(){
		return $this->id;
	}
	
	public function getNome(){
		return $this->nome;
	}
	
	public function getDescricao(){
		return $this->descricao;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function setNome($nome){
		$this->nome = $nome;
	}
	
	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function create(){
		$sql  = "INSERT INTO $this->table (nome, descricao) VALUES (:nome, :descricao)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':descricao', $this->descricao);
		return $stmt->execute(); 
	}

	public function find( $id ) {
		$sql  = "SELECT * FROM $this->table WHERE id = :id";
		$stmt = DB::prepare( $sql );
		$stmt->bindParam( ':id', $id, PDO::PARAM_INT );
		$stmt->execute();
		return $stmt->fetchAll();
	}
	
	public function update( $id ) {
		$sql  = "UPDATE $this->table SET nome = :nome, descricao = :descricao WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':descricao', $this->descricao);
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