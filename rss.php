<?php
header('Content-Type: text/xml');
require('connect.php');

echo '<?xml version="1.0" encoding="ISO-8859-1"?>
<rss version="2.0">
<channel>
<title>DataStop</title>
<description>Recent Activity</description>
<link>http://127.0.0.1/page/front.php</link>';
$query = "Select * from records";
$result = mysqli_query($connection, $query);
if(!$result) die("Query failed".mysql_error());
$rowcount = mysqli_num_rows($result);
if($rowcount >= 1) {
	for($i = 1; $i <= $rowcount; $i++) {
		$row = mysqli_fetch_assoc($result);
		echo '
			<item>
				<title>Records</title>
				<description>'.$row["mname"].' just '.$row["op"].' a file</description>
			</item>';
	}
}	
echo '</channel>
</rss>';
?>