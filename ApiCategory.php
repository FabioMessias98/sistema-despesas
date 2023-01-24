<?php
	require_once 'Crud.php';

	class ApiCategory extends Crud {
		protected $table = 'categorias';
		private $data;

		public function __construct( $data ) {
			$this->data = $data;
		}

		public function create() {
			foreach( $this->data as $category ) :
				$sql  = "INSERT INTO $this->table (nome, descricao) VALUES (:nome, :descricao)";
				$stmt = DB::prepare( $sql );
				$stmt->bindParam( ':nome', $category->nome );
				$stmt->bindParam( ':descricao', $category->descricao );
				$stmt->execute(); 
			endforeach;
		}
	}

?>