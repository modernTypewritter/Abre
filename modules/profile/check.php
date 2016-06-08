<?php
	
	/*
	* Copyright 2015 Hamilton City School District	
	* 		
	* This program is free software: you can redistribute it and/or modify
    * it under the terms of the GNU General Public License as published by
    * the Free Software Foundation, either version 3 of the License, or
    * (at your option) any later version.
	* 
    * This program is distributed in the hope that it will be useful,
    * but WITHOUT ANY WARRANTY; without even the implied warranty of
    * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    * GNU General Public License for more details.
	* 
    * You should have received a copy of the GNU General Public License
    * along with this program.  If not, see <http://www.gnu.org/licenses/>.
    */
	
	require_once(dirname(__FILE__) . '/../../core/abre_verification.php'); 
	require_once(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
	require_once(dirname(__FILE__) . '/../../core/abre_functions.php');
	
	if($_SESSION['usertype']=="staff")
	{
		$sql = "SELECT *  FROM profiles where email='".$_SESSION['useremail']."'";
		$result = $db->query($sql);
		while($row = $result->fetch_assoc())
		{
			$streams=htmlspecialchars($row["streams"], ENT_QUOTES);
		}
		if($streams=="")
		{
			$sql = "SELECT * FROM users where email='".$_SESSION['useremail']."' and superadmin=1";
			$result = $db->query($sql);
			$row_cnt = $result->num_rows;
			if($row_cnt==0)
			{
				echo "no";
			}
		}
	}
	
?>