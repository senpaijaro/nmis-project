<?php
	
		include 'config.php';
		
 
		function add_administrator(){
		global $conn;
		if(isset($_POST['btn-add'])){
		$fname  	= $conn->real_escape_string($_POST['fname']);
		$mname  	= $conn->real_escape_string($_POST['mname']);
		$lname  	= $conn->real_escape_string($_POST['lname']);
		$cnumber  	= $conn->real_escape_string($_POST['cnumber']);
		$email  	= $conn->real_escape_string($_POST['email']);
		$pass  		= $conn->real_escape_string($_POST['pass']);
		$hash       = password_hash($pass, PASSWORD_DEFAULT);

		$query      = $conn->query("INSERT INTO user_accounts_tbl (firstname,middlename,lastname,contact,email,password,
			status,role) VALUES ('$fname','$mname','$lname','$cnumber','$email','$hash','1','1')"); 
		if($query){
			?>
		<script type="text/javascript">
		swal({   
			title: "Successfully!",  
			 timer: 4000, 
			 type: "success",  
			 showConfirmButton: false 
			});
		</script>
			<?php
		}else{
			echo "<div class='alert alert-sucess'><strong>Successfully</strong> added administrator</div>";
		}
	}
}

		function show_administrator(){
		global $conn;
		$query = $conn->query("SELECT * FROM user_accounts_tbl WHERE status='1'");
		while($row = $query->fetch_object()){
		if($row->role == 0){
					$role = '<label class="label label-danger"> Admin </label>';
		}elseif($row->role == 1){
					$role = '<label class="label label-success"> Admin </label>';
		}
		echo 
				'
				<tr>
	              <td>'.$row->firstname.'</td>
	              <td>'.$row->middlename.'</td>
	              <td>'.$row->lastname.'</td>
	              <td>'.$row->email.'</td>
	              <td>'.$row->contact.'</td>
	              <td>'.$role.'</td>
	              <td>
	              <form method="POST" action="">
	              <input type="hidden" name="id"  value="'.$row->id.'">
	              <button type="submit" class="btn btn-primary" name="btn-view"><i class="fa fa-eye"></i> view </div>
	              </form>
	              </td>
	            </tr>
				';
	}
	if(isset($_POST['btn-view'])){
		@session_start();
		$id = $conn->real_escape_string($_POST['id']);
		$_SESSION['ids'] = $id;
				echo '<script>window.location.href="show-administrator.php"</script>';

	}
}
		function modify_administrator(){
		global $conn;

		if(isset($_POST['btn-update'])){
		
		$id         = $conn->real_escape_string($_POST['id']);
		$fname  	= $conn->real_escape_string($_POST['fname']);
		$mname  	= $conn->real_escape_string($_POST['mname']);
		$lname  	= $conn->real_escape_string($_POST['lname']);
		$contact  	= $conn->real_escape_string($_POST['cnumber']);
		$email  	= $conn->real_escape_string($_POST['email']);

		$query      = $conn->query("UPDATE user_accounts_tbl SET firstname='$fname', middlename='$mname', lastname='$lname', contact='$contact', email='$email' WHERE id=$id");
		if($query)	{	
			?>
		<script type="text/javascript">
		swal({   
			title: "Success",
			text: "Successfully updated", 
			 timer: 4000, 
			 type: "success",  
			 showConfirmButton: false 
			});
		 setTimeout("location.href = 'index.php'",2000);

		</script>
			<?php		
		}else{	
			?>
		<script type="text/javascript">
		swal({   
			title: "Error",  
			 timer: 4000, 
			 type: "danger",  
			 showConfirmButton: false 
			});
		</script>
			<?php		
		}
	}
}
