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


/*
* 	   Simple file Upload system with PHP.
* 	   Created By Tech Stream
* 	   Original Source at http://techstream.org/Web-Development/PHP/Single-File-Upload-With-PHP
*      This program is free software; you can redistribute it and/or modify
*      it under the terms of the GNU General Public License as published by
*      the Free Software Foundation; either version 2 of the License, or
*      (at your option) any later version.
*      
*      This program is distributed in the hope that it will be useful,
*      but WITHOUT ANY WARRANTY; without even the implied warranty of
*      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*      GNU General Public License for more details.
*     
*/
	if(isset($_FILES['image'])){
		$errors= array();
		$file_name = "data.csv";
		$file_size =$_FILES['image']['size'];
		$file_tmp =$_FILES['image']['tmp_name'];
		$file_type=$_FILES['image']['type'];   

		if($file_size > 209715200){
		$errors[]='File size is too large, Please mail at ashish[at]reak.in';
		}				
		if(empty($errors)==true){
			move_uploaded_file($file_tmp,$file_name);
			include "convert.php";
			makexml();
		}else{
			print_r($errors);
		}
	}
?>