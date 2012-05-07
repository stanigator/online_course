<html>
	
	<head>
	</head>
	
	<body>
		<?php

		if(!isset($_SESSION['name'])) session_start();

		if(!isset($_SESSION['name']))
		{
			echo "Access denied!";
			exit;
		}
		else
		{ 
			include("session.php");
			echo "<center>";
			echo "<form method=\"GET\" action=\"search.php\">";
			echo "<input type=\"text\" name=\"search\" /><br />";
			echo "<input type=\"submit\" name=\"submit\" value=\"Search Database\" /><br />";
			echo "</form>";
			echo "</center>";
		
			echo "<hr />";
			echo "<u>Results:</u>&nbsp";
			if(isset($_REQUEST['submit']))
			{
				$search = $_GET['search'];
				$terms = explode(" ", $search);
				$query = "SELECT * FROM users WHERE ";
			
				$i = 0;
			
				foreach($terms as $each)
				{
					$i++;
					if($i == 1)
					{
						$query .= "name LIKE '%$each' ";
					}
					else
					{
						$query .= "OR name LIKE '%$each' ";
					}
				}
			
				mysql_connect("localhost", "root", "");
				mysql_select_db("testsite");
			
				$query = mysql_query($query);
				$num = mysql_num_rows($query);
			
				// Loop through all the results
				if($num > 0 && $search != "")
				{
					echo "$num result(s) found for <b>$search</b>!";
					while($row = mysql_fetch_assoc($query))
					{
						$id = $row['id'];
						$name = $row['name'];
						$email = $row['email'];
						$password = $row['password'];
					
						echo "<br /><h3>Name: $name(id: $id)</h3>email: $email<br />password: $password<br />";
					}
				}
				else
				{
					echo "No results found";
				}
			
				mysql_close();
			}
			else
			{
				echo "Please type any word";
			}
		}
		?>
		
	</body>
	
	
</html>
