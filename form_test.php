<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Form Test</title>
	</head>
	<body>
		<p>The following tables shows the raw data received by a HTTP POST request (HTML form with method='post').
		The browser sends only names and values of form elements.
		</p>

<?php
function escape(&$value) {
	$value = htmlspecialchars($value, ENT_NOQUOTES, 'UTF-8');
}
array_walk_recursive($_POST, 'escape');

if (count($_POST) > 0) {
	echo "<table border='1'>\n";
	echo "\t<tr>\n";
	echo "\t<th>Jméno prvku</th>\n";
	echo "\t<th>Hodnota</th>\n";
	echo "\t</tr>\n";
	foreach ($_POST as $key => $value) {
		echo "\t<tr>\n";
		echo "\t<td>".$key."</td>\n";
		echo "\t<td>";
		if (is_array($value)) {
			echo implode(', ', $value);
		} else {
			echo nl2br($value);
		}
		echo "</td>\n";
		echo "\t</tr>\n";
	}
	echo "</table>\n";
} else {
	echo "<p><strong class='warning'>No data came in.</strong> If you want to show data sent by some
		form, you need to create a (static or dynamic) page form with the following header: <br />
		<pre><code>&lt;form\n action='https://odinuv.cz/common/form_test.php'\n method='post'&gt;</code></pre>
		</p>";
}
?>

</body></html>
