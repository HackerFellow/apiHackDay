<?PHP
//All requests go here, and set the GET page to tell us what they want
//Some very questionable decisions are made here, to meet the requirements.
//JSON is passed from the search page into the button, which throws it via
// an ajax post call to the API, which stores it in database.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("db.php");
require_once("BookAPI.php");

$page = isset($_GET["page"]) ? htmlspecialchars($_GET["page"]) : null;


//Out is where all our HTML goes.
$out = "";
if($page == "api"){
	api();
}
//Human pages past this, they all need HTML
switch($page){
	case "search":
		$title = "Search for a book/author";
		$out .= head($title);

		//Get all search terms, pass to search
		$q = isset($_GET["q"]) ? htmlspecialchars($_GET["q"]) : null;//query
		$i = isset($_GET["i"]) ? htmlspecialchars($_GET["i"]) : null;//index
		$t = isset($_GET["t"]) ? htmlspecialchars($_GET["t"]) : null;//type (book,author, dunno if we support others
		$p = isset($_GET["p"]) ? htmlspecialchars($_GET["p"]) : null;//page

		$out .= search($q,$i,$t,$p);
		break;
	default:
		$title = "api database thing";
		$out .= head($title);
		$out .= home();
}
$out .= foot();
echo $out;


function api(){
	$a = isset($_GET["a"]) ? htmlspecialchars($_GET["a"]) : null;//action
	switch($a){//Action
		case "bookAdd":
			if(json_decode($_POST["json"]) === null){//Invalid json
				echo "{\"response\": \"adding book\"," . $_POST["json"]."}";
			}
			$db = new DB();
			$db->bookAdd($_POST["json"]);
			echo "{\"response\": \"added book\"}";
			break;
		case "search":
			$api = new BookAPI();
		$q = isset($_GET["q"]) ? htmlspecialchars($_GET["q"]) : null;//query
		$i = isset($_GET["i"]) ? htmlspecialchars($_GET["i"]) : null;//index
		$t = isset($_GET["t"]) ? htmlspecialchars($_GET["t"]) : null;//type (book,author, dunno if we support others
		$p = isset($_GET["p"]) ? htmlspecialchars($_GET["p"]) : null;//page
			//So array_filter will remove null from array, so we only pass
			//non-null arguments. Defaults will be filled on the other side.
			echo $api->search(
				array_filter([
					"query" => $q,
					"page" => $p,
					"index" => $i,
					"type" => $t
				])
			);
			break;
		default:
			echo "{\"response\": \"Do better requests, nerd\"}";
	}
	exit(0);
}//End API

function search($q,$i,$t,$p){
	$out = "";
	if($q === null){
		//no search

	}else{//search fields populated
		$api = new BookAPI();

		//So array_filter will remove null from array, so we only pass
		//non-null arguments. Defaults will be filled on the other side.
		$res = $api->search(
			array_filter([
				"query" => $q,
				"page" => $p,
				"index" => $i,
				"type" => $t
			])
		);
		$out .= "<button type=\"button\" onclick=\"loadData('&q=$q')\">REFRESH</button>";
		$out .= "<table id=\"searchResult\" class=\"tablesorter\">\n";
		$out .= "\t<thead><tr>\n";
		$out .= "\t\t<th>Title</th>\n";
		$out .= "\t\t<th>Author(s)</th>\n";
		$out .= "\t\t<th>Buttons</th>\n";
		$out .= "\t</tr></thead>\n";
		$out .= "\t<tbody id=\"searchData\">\n";

		//This is supposed to happen in JS. Whoops.
		////Now we have search results, display them.
		//foreach($res["data"] as $key => $book){
		//	$out .= "\t<tr>\n";
		//	//TODO: have book view
		//	$out .= "\t\t<td>{$book["title"]}</td>\n";
		//	//Author list
		//	$out .= "\t\t<td>\n";
		//	$out .= "\t\t\t<ul>\n";
		//	foreach($book["author_data"] as $author){
		//		//TODO: re-enable link when author list exists
		//		//Also make it so it's not a search.
		//		$link = "?p=search&amp;q={$author["id"]}&amp;t=author";
		//		//$out .= "\t\t\t\t<li><a href=\"$link\">{$author["name"]}</a></li>\n";
		//		$out .= "\t\t\t\t<li>{$author["name"]}</li>\n";
		//	}
		//	$out .= "\t\t\t</ul>\n";
		//	$out .= "\t\t</td>\n";
		//	//End author list

		//	//Buttons
		//	$out .= "\t\t<td>\n";
		//	//This button will have onclick set to a function with the
		//	//hardcoded parameter of a json object of the book.
		//	//Best practice? In *my* program? It's not as likely as you think
		//	$json = htmlspecialchars(json_encode($book), ENT_QUOTES);
		//	$out .= "\t\t\t<button type=\"button\" onclick='bookAdd($json);'>Add book</button>";
		//	$out .= "\t\t</td>\n";

		//	$out .= "\t</tr>\n";
		//}
		$out .= "\t</tbody>\n";
		$out .= "</table>\n";
	}
	return $out;
}




function home(){
	$out = "";
	$out .= "Some shit";

	return $out;
}

function head($title){
	return <<<HEAD
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>$title</title>

		<link rel="stylesheet" href="style.css">
	</head>
	<body>
HEAD;
}

function foot(){
	return <<<FOOT
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
		<script type="text/javascript" src="https://raw.githubusercontent.com/christianbach/tablesorter/master/jquery.tablesorter.min.js"></script>
		<script type="text/javascript" src="js.js"></script>
	</body>
</html>
FOOT;
}

