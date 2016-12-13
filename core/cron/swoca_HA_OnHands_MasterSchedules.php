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
	
	//Required configuration files
	require(dirname(__FILE__) . '/../../configuration.php'); 
	require(dirname(__FILE__) . '/../../core/abre_dbconnect.php'); 
	require(dirname(__FILE__) . '/../../core/abre_functions.php');
	
	mysqli_query($db, "DELETE FROM Swoca_HA_OnHands_MasterSchedules WHERE Id>0");

	$handle = fopen("../../../swoca/HA_OnHands_MasterSchedules.txt", "r");
		
	$count=0;
	while (($data = fgetcsv($handle, 1000000, "\t")) !== FALSE)
	{
		if($count!=0)
		{
			$SchoolCode = $data[0];
			$CourseCode = $data[1];
			$SectionCode = $data[2];
			$StaffId = $data[3];
			$TermCode = $data[4];
			$Day = $data[5];
			$Period = $data[6];
			$SchoolYear = $data[7];
			
			$import="INSERT into Swoca_HA_OnHands_MasterSchedules (SchoolCode,CourseCode,SectionCode,StaffId,TermCode,Day,Period,SchoolYear) values ('$SchoolCode','$CourseCode','$SectionCode','$StaffId','$TermCode','$Day','$Period','$SchoolYear')";
			mysqli_query($db,$import);
		}
		$count++;
	}
		
	fclose($handle);

?>