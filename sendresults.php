<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
&lt;?php<br>
//--------------------------Set these paramaters--------------------------<br>
<br>
// Subject of email sent to you.<br>
$subject = 'Results from Contact form'; <br>
<br>
// Your email address. This is where the form information will be sent. <br>
$emailadd = 'mcmullendustin@yahoo.com'; <br>
<br>
// Where to redirect after form is processed. <br>
$url = 'http://www.rdsnetworks.net/confirmation.html'; <br>
<br>
// Makes all fields required. If set to '1' no field can not be empty. If set to '0' any or all fields can be empty.<br>
$req = '0'; <br>
<br>
// --------------------------Do not edit below this line--------------------------<br>
$text = "Results from form:\n\n"; <br>
$space = ' ';<br>
$line = '<br>
';<br>
foreach ($_POST as $key =&gt; $value)<br>
{<br>
if ($req == '1')<br>
{<br>
if ($value == '')<br>
{echo "$key is empty";die;}<br>
}<br>
$j = strlen($key);<br>
if ($j &gt;= 20)<br>
{echo "Name of form element $key cannot be longer than 20 characters";die;}<br>
$j = 20 - $j;<br>
for ($i = 1; $i &lt;= $j; $i++)<br>
{$space .= ' ';}<br>
$value = str_replace('\n', "$line", $value);<br>
$conc = "{$key}:$space{$value}$line";<br>
$text .= $conc;<br>
$space = ' ';<br>
}<br>
mail($emailadd, $subject, $text, 'From: '.$emailadd.'');<br>
echo '&lt;META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'"&gt;';<br>
?&gt;
</body>
</html>
