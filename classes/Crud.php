<?php 
class Crud {

	private $pdo;

	public function __construct() {
		try {
			$this->pdo = new PDO("mysql:dbname=crud_usu;host=localhost", "root", "root");
		}	catch(PDOException $e) {
				echo "ERRO: ".$e->getMessage();
		}
	}


	public function create($nome, $email, $senha) {
		if($this->verificarEmail($email) == false) {
			$sql = "INSERT INTO usuarios (nome, email, senha) values (:nome, :email, :senha)";
		$sql = $this->pdo->prepare($sql);
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":senha", $senha);
			$sql->execute();
				return true;
		}	else {
				return false;
		}
	}

	public function read() {
		$sql = "SELECT * FROM usuarios";
		$sql = $this->pdo->query($sql);

		if($sql->rowCount() > 0) {
			return $sql->fetchAll();
		}	else {
				return array();
		}
	}

	public function update($id, $nome, $email, $senha) {
		$sql = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":senha", $senha);
			$sql->execute();
	}

	public function selectUsuEx($id) {
		$sql = "SELECT * FROM usuarios WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id", $id);
			$sql->execute();

			if($sql->rowCount() > 0) {
				return $sql->fetch();
			}
				return array();
	}

	public function delete($id) {
		$sql = "DELETE FROM usuarios WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
			$sql->bindValue(":id", $id);
			$sql->execute();

				return true;
	}

	public function verificarEmail($email) {
		$sql = "SELECT * FROM usuarios WHERE email = :email";
		$sql = $this->pdo->prepare($sql);
			$sql->bindValue(":email", $email);
			$sql->execute();

			if($sql->rowCount() > 0) {
				return true;
			}	else {
					return false;
			}
	}


}
?>