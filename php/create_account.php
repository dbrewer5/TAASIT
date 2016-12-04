<?php
	include('session.php');
	
	// Define variables and set to empty values
	$firstName = $lastName = $streetAddress = $city = $zipCode = $state = $phoneNum = $employeeId = $password = "";
	
	$employeeId = $_POST["employeeId"];

	$check_record_exists_sql = mysqli_query($db,"SELECT * FROM EMPLOYEE where EmployeeID = '$employeeId'");
	
	if ($check_record_exists_sql) {
		die("Employee account already exists!");
	}
	else {
		$firstName = $_POST["firstName"];
		$lastName = $_POST["lastName"];
		$streetAddress = $_POST["streetAddress"];
		$city = $_POST["city"];
		$zipCode = $_POST["zipCode"];
		$state = $_POST["state"];
		$phoneNum = $_POST["phoneNum"];
		$password = $_POST["password"];

		$new_employee_sql = "INSERT INTO EMPLOYEE (EmployeeID, FirstName, LastName, StreetAddress, City, Zip, ShortState, PhoneNumber, Password)
								VALUES ('$employeeId', '$firstName', '$lastName', '$streetAddress', '$city', '$zipCode', '$state', '$phoneNum', '$password')";
		$result = mysqli_query($db, $new_employee_sql);
		
		if ($result) {
			die("Account was successfully created!");
		}
	}

?>