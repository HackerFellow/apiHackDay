<?PHP
class DB {
	private $dbname = "apihackday";
	private $dbuser = "apihackday";
	private $host = "localhost";
	private $dbpass = "hunter.2";

	function __construct(){
		return new PDO(
			"pgsql:dbname={$this->dbname};host={$this->host}",
			$this->dbuser,
			$this->dbpass);
	}

	function bookAdd($json){

	}
}
