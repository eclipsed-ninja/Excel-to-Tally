<?php

/*
 * (C) Ashish Saxena <ashish@reak.in>
 * (C) 2016 REAK INFOTECH LLP
 *
 * The LICENSE file included with the project would govern the use policy for this code,
 * In case of missing LICENSE file the code will be treated as an Intellectual Property of the creator mentioned above,
 * All rights related to distribution, modifcation, reselling, use for commercial or private use of this code is terminated.
 *
 */

<html>
	<head><title>Internal Tool - Accounting Dept.</title></head>
<body>
<center>
	<img src="http://reak.in/img/logo.png" />
	<br /><br />
	<h2>Internal tool of REAK Infotech LLP</h2>
	<br /><br />
	This tool is created only for use within the company for accounting purposes, All accesses and files uploaded are logged. And any unauthorized activity can be penalized under the IT Act 2000 and violation of IPR.
	<br /><br />
	Please upload the file and save the converted tally.xml in the tally folder and import in Tally 9.<br /><br />
	<hr>
		<br /><br />
</center>

<form action="process.php" method="POST" enctype="multipart/form-data">
<input type="file" name="image" /><br /><br />
<input type="submit" value="Convert Now !"/>
</form>

<center>
	<hr>
	<h5>In case of any failure or issues, Please consider emailing at ashish[at]reak.in or leaving a message on +91.9407339761 or a BBM Message on 2BE24CBA</h5>
</center>
</body>
</html>