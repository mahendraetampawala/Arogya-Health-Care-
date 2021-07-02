
<?php
if(isset($_REQUEST["file"])){
    // Get parameters
    $file = $_REQUEST["file"]; // Decode URL-encoded string
    $filepath = "../Upload/File/".$file;
   
	$len = filesize($filepath); // Calculate File Size
		ob_clean();
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: public"); 
	header("Content-Description: File Transfer");
	header("Content-Type:application/image"); // Send type of file
	$header="Content-Disposition: attachment; filename=$file;"; // Send File Name
	header($header );
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: ".$len); // Send File Size
	@readfile($filepath);
	exit;
}
?>