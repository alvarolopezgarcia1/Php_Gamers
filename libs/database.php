<?php
class database
{


	protected $_config;
	private $dbc;
	private $result;
	private static $instance= null;


	private function __construct()
	{
		$this->_config = array('driver' => 'mysql', 'host' => 'localhost', 'dbname' => 'games', 'username' => 'root', 'password' => '');
		$this->getPDOConnection();

	}

	public function __destruct()
	{
		$this->dbc = NULL;
	}

	public static function getInstance()
	{
      
		if (database::$instance == null)
			database::$instance = new database();
			
		return database::$instance;
	}

	private function getPDOConnection()
	{
		// Check if the connection is already established
		if ($this->dbc == NULL) {
			// Create the connection
			$dsn = "" .
				$this->_config['driver'] .
				":host=" . $this->_config['host'] .
				";dbname=" . $this->_config['dbname'];
			try {
				$this->dbc = new PDO($dsn, $this->_config['username'], $this->_config['password']);
			} catch (PDOException $e) {
				echo __LINE__ . $e->getMessage();
			}
		}
	}


	public function runQuery($sql, $parameters = [])
	{
		$this->result = $this->dbc->prepare($sql);
		$this->result->execute($parameters);
		return $this->result;
	}


	public function getObject($cls = "StdClass")
	{
		if (is_null($this->result)) return null;
		// si tenemos un resultado, lo devolvemos
		return $this->result->fetchObject($cls);
	}

public function __wakeup(){

			$this->connect() ;
		}
	}

?>