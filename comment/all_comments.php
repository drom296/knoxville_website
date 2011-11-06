<h2>Comments</h2>
	
		<?php 
			
			//hook up to my db
			// $dbLink=mysql_connect("localhost","pjm8632","PC2perri")
				// or die("couldn't connect: ".mysql_error());
				
			$dbLink=mysql_connect("localhost","root","")
				or die("couldn't connect: ".mysql_error());
				
			// select database
			mysql_select_db("pjm8632");
			
			$clear = array();
			// //stop sql injection for $_GET
			// foreach($_GET as $key => $val){
				// $clear[$key]=mysql_real_escape_string($val);
			// }
// 			
			// //stop sql injection for $_POST
			// foreach($_POST as $key => $val){
				// $clear[$key]=mysql_real_escape_string($val);
			// }
			
			
			$clear = $_GET;
			
			//include("../dbInfo.php");
			//is_numeric() php function	
			////////////user entered data... (has been sanitized)
			if(isset($clear['name'])&& isset($clear['comment'])&&
				''&& $clear['name'] != ''&& $clear['comment'] != ''){
				//build the query and stick it in the db
				$query = "insert into knoxville_comments (name, comment) values ('".$clear['name']."','".$clear['comment']."')";
				
				$res=mysql_query($query);
				echo '<h2>data entered!</h2>';
			}else{
				echo '<h2 style="color:red">You entered no or bad data</h2>';
			}
			
			//get all data from db
			
			$query="select * from knoxville_comments";
			$res=mysql_query($query);
				
			if(mysql_num_rows($res) == 0){
				echo "no records found";
			}else{
				//print out as table
				if($res){
					$firstRow = true;
					$result='<table border="1"><tr>';
					
					while($row=mysql_fetch_assoc($res)){
						if ($firstRow) {
							//give the table a table header...
							foreach($row as $index => $val){
								$result .= "<th>".$index."</th>";
							}
							$result.="</tr>";
							$firstRow = false;
						}//first row
					
						$result.="<tr>";
						foreach($row as $index => $val){
							$result .='<td style="padding:10px">'.$val.'</td>';
						}
						$result.="</tr>";					
					}//fetch
					
					$result .= "</table>";
					echo $result;
	
				} //if res
			}//if records found
		?>