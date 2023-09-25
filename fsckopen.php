<?php
    if (!empty($_POST))
    {
        $txtIP = $_POST['txtIP'];
		//$Connect = fsockopen('10.4.17.13', "80", $errno, $errstr, 1);

		$Connect = fsockopen($txtIP, "8080", $errno, $errstr, 1);
		if($Connect){
			$soap_request="<GetAttLog><ArgComKey xsi:type=\"xsd:integer\">BWXP185061443</ArgComKey><Arg><PIN xsi:type=\"xsd:integer\">All</PIN></Arg></GetAttLog>";
			$newLine="\r\n";
			fputs($Connect, "POST /iWsService HTTP/1.0".$newLine);
			fputs($Connect, "Content-Type: text/xml".$newLine);
			fputs($Connect, "Content-Length: ".strlen($soap_request).$newLine.$newLine);
			fputs($Connect, $soap_request.$newLine);
			$buffer="";
			while($Response=fgets($Connect, 1024)){
				$buffer=$buffer.$Response;
			}
			var_dump($buffer);die;
			$buffer = Parse_Data($buffer,"<GetAttLogResponse>","</GetAttLogResponse>");
			$buffer = explode("\r\n",$buffer);

		    die('connected! <a href=\'http://vanuatuhrgovernment.macroworkspace.com/fsckopen.php\'>Back</a>');
		} else {
		    die('not connected! <a href=\'http://vanuatuhrgovernment.macroworkspace.com/fsckopen.php\'>Back</a>');
		}
    } else {?>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Test Socket</title>
    </head>
    <body>
        <h3>Input IP Address of Finger Machine</h3>
        <form method="post">
            <input type="txtIP" name="txtIP" />
            <input type="submit" name="sbmt" value="Test it !"/>
        </form>
    </body>
</html>
<?php
    }

/*
if( ($this->master=socket_create(AF_INET,SOCK_STREAM,SOL_TCP)) < 0 )
{
    die("socket_create() failed, reason: ".socket_strerror($this->master));
} else {
    die('ok');
}
*/
?>