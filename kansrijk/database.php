<?php

class database{
    private $host;
    private $username;
    private $password;
    private $database;
    private $charset;
    private $db;

    public function __construct(){
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->database = 'kansrijker';
        $this->charset = 'utf8mb4';

        try{
            $dsn = "mysql:host=$this->host;dbname=$this->database;charset=$this->charset";
            $this->db = new PDO($dsn, $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "succesfully connected to the db";
        }catch(PDOException $e){
            $this->db->rollback();
            echo "failed" . $e->getMessage();
            throw $e;
        }
    }

    function register($username, $email, $password){

        $sql = "INSERT INTO account VALUE (:id, :username, :email, :password, :created_at);";
    
        $stmt = $this->db->prepare($sql);
        
        $stmt->execute([
            'id'=>NULL,
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'created_at' => date("Y-m-d H:i:s")
        ]);
    
        header('location: medewerker.php');
      
    }

    function add_jongeren($roepnaam, $tussenvoegsel, $achternaam, $inschrijfdatum ){

        $sql = "INSERT INTO jongere VALUE (:jongerecode, :roepnaam, :tussenvoegsel, :achternaam, :inschrijfdatum);";
    
        $stmt = $this->db->prepare($sql);
        
        $stmt->execute([
            'jongerecode'=>NULL,
            'roepnaam' => $roepnaam,
            'tussenvoegsel' => $tussenvoegsel,
            'achternaam' => $achternaam,
            'inschrijfdatum' => date("Y-m-d H:i:s")
        ]);
    
        header('location: jongeren.php');
      
    }

    public function login($username, $password){
        $sql = "SELECT id, username, password FROM account WHERE username = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'username' => $username
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        print_r($result);
        if(is_array($result)){
            if(count($result) > 0){
                if($username == $result['username'] && password_verify($password, $result['password'])){
                    echo "login succes";
                    header('location: home.php');
                }
            }else {
                echo "failed.";
            }
        }else{
            echo "failed to login";
        }
    }

    public function updatemedewerker($username, $email){
	/*	try{
			//begin the transaction
			$this->db->beginTransaction();			
			$sql = "UPDATE account WHERE username=:username";
			echo "sql statement: $sql <br>";
			
            //prepare
			$stmt = $this->db->prepare($sql);			
            echo "fuck <br>";
            
            //execute
			$stmt->execute([
			'username'=> $username,
			'email'=> $email	
			]);

			$this->db->commit();
			echo "medewerker is updated";
			header("location: medewerker.php");
		}
		catch (PDOexception $e){			
			$this->db->rollback();
			echo "failed: ".$e->getMessage();
			throw $e;
			
		}
        */
	}

    public function select($statment, $named_placeholder){

        $stmt = $this->db->prepare($statment);
        $stmt->execute($named_placeholder);
        $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update_or_delete($statement, $named_placeholder){
        
        $stmt = $this->db->prepare($statement);
        $stmt->execute($named_placeholder);
        
    
    }

    function activiteit_toevoegen($activiteit){

        $sql = "INSERT INTO activiteit VALUES (:actiecode, :activiteit)";
    
        $stmt = $this->db->prepare($sql); 
        $stmt->execute([
            'actiecode'=>NULL,
            'activiteit' => $activiteit
        ]);
    }

    function instituut_toevoegen($instituut, $telefooninstituut){

        $sql = "INSERT INTO instituut VALUES (:instituutcode, :instituut, :telefooninstituut)";
    
        $stmt = $this->db->prepare($sql); 
        $stmt->execute([
            'instituutcode'=>NULL,
            'instituut' => $instituut,
            'telefooninstituut' => $telefooninstituut
        ]);
    }

    public function koppel($activiteitcode, $jongerecode){
	
		try{
			$this->db->beginTransaction();
			$sql = "INSERT INTO koppel(koppelcode, activiteitcode, jongerecode) 
				VALUES(:koppelcode, :activiteitcode, :jongerecode)";
			echo "sql statement: ".$sql."<br>";
			$stmt = $this->db->prepare($sql);	
			
			$stmt->execute([
			'koppelcode' => NULL,
			'activiteitcode' => $activiteitcode,
			'jongerecode'=>$jongerecode
			]);

			$this->db->commit();
			echo "Assigned Activiteit";
			header("location: jongeren.php.php");
		}
		catch (PDOexception $e){			
			$this->db->rollback();
			echo "failed: ".$e->getMessage();
			throw $a;
			
		}
	}

}




?>