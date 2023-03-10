<?php

require_once 'DB.php';

abstract class Crud extends DB {

	protected $table;

	abstract public function create();

	public function store() {
		$sql  = "SELECT * FROM $this->table";
		$stmt = DB::prepare( $sql );
		$stmt->execute();

		return $stmt->fetchAll();
	}

	public function delete( $id ) {
		$sql  = "DELETE FROM $this->table WHERE id = :id";
		$stmt = DB::prepare( $sql );
		$stmt->bindParam( ':id', $id, PDO::PARAM_INT );
		return $stmt->execute(); 
	}
}