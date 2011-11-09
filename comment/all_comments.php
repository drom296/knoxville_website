<h1>Comments</h1>
	
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
				//print out comment
				if($res){
					$firstRow = true;
					// $result='<div>';
					
					$result = "";
					
					while($row=mysql_fetch_assoc($res)){
							// first row: field names
							// do nothing
							if ($firstRow) {
								$firstRow = false;
								continue;
							}//first row
						
						$result .="<div class='allCommentsSingleDiv noFloat'>";
							$result .= "<div class='allCommentsUser'>";
								$result .= "<p>".$row['name']."</p>";
								$result .= "<p>".$row['date']."</p>";
								$result .= "<div class='noFloat'></div>";
							$result .= "</div>";

							$result .= "<div class='allCommentsSingleComment'>";
								$result .= "<p>".$row['comment']."</p>";
							$result .= "</div>";
							
							// this is done so the height of the divs would take 
							// into account the height of the inner floating divs
							$result .= "<div class='noFloat'></div>";
						
							// $result .= "<br />";
							// $result .= "<br />";								
						$result .= "</div>";
						// $result .= "<br />";
					}//fetch
					
					// $result .= "</div>";
					echo $result;
	
	
	
	
				// //print out as table
				// if($res){
					// $firstRow = true;
					// $result='<table border="1"><tr>';
// 					
					// while($row=mysql_fetch_assoc($res)){
						// if ($firstRow) {
							// //give the table a table header...
							// foreach($row as $index => $val){
								// $result .= "<th>".$index."</th>";
							// }
							// $result.="</tr>";
							// $firstRow = false;
						// }//first row
// 					
						// $result.="<tr>";
						// foreach($row as $index => $val){
							// $result .='<td style="padding:10px">'.$val.'</td>';
						// }
						// $result.="</tr>";					
					// }//fetch
// 					
					// $result .= "</table>";
					// echo $result;
// 	
				} //if res
			}//if records found
		?>