<h2>Comments</h2>
	
		<?php 
			
			//hook up to my db on Nova
			// prepend @ to suppress warnings
			$dbLink=@mysql_connect("localhost","pjm8632","PC2perri");
			
			// May have failed because we are running locally
			if (!$dbLink){
				$dbLink=@mysql_connect("localhost","root","")
					or die("couldn't connect: ".mysql_error());
			}
				
			// select database
			mysql_select_db("pjm8632");
			
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