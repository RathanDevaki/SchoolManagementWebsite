<html>
<head>
</head>

<body>
<div style="padding: 20px; border: 1px solid #999">


<h2>Upload Guidelines and notifications :</h2>
<form enctype="multipart/form-data" method="post">
<p><input type="hidden" name="MAX_FILE_SIZE" value="200000" /> <input
	type="file" name="pdfFile" /><br />
<br />
<input type="button" value="upload!" /></p>
</form>

</div>
</body>
</html>

<?php 
  
// Store the file name into variable 
$file = 'SCHOOLRULES.pdf'; 
$filename = 'SCHOOLRULES.pdf'; 
  
// Header content type 
header('Content-type: application/pdf'); 
  
header('Content-Disposition: inline; filename="' . $SCHOOLRULES . '"'); 
  
header('Content-Transfer-Encoding: binary'); 
  
header('Accept-Ranges: bytes'); 
  
// Read the file 
@readfile($file); 
  
?> 
