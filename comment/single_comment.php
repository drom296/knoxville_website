<h2>Enter Your Comment</h2>
		<form method="GET" action="dbPutStart.php" onsubmit="return val();">
		<!-- should this send to the action by the method if there is no data?  NO!  JavaScript validation! -->
			<input type="text" name="name"/>Name<br/>
			<input type="text" name="comment"/>Comment<br/>
			<input type="submit" value="add to db"/>
		</form>	