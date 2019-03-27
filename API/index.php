<?php	
$_SERVER;
 
Switch ($_SERVER["REQUEST_METHOD"])
{
	case 'GET':
		echo "get";
		break;
	case 'POST':
		echo "post";
		break;
		case 'PUT':
		echo "put";
		break;
	case 'DELETE':
		echo "delete";
	break;	
}
?>