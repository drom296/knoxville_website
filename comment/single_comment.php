<h2>Enter Your Comment</h2>
	<div id="enterCommentDiv">
		<form id="enterCommentForm" name="enterComment" class="center" method="get" action="comment/process_comment.php" onsubmit="return validateCommentForm();">
		<!-- should this send to the action by the method if there is no data?  NO!  JavaScript validation! -->
			<label for="uName">Name</label>
			<input class="ident" type="text" name="uName" id="uName"/><br/>
			<label for="comment">Comment</label><br/>
			<textarea class="ident" name="comment" id="comment" cols="50" rows="5"></textarea><br />
			<input id="commentSubmit" type="submit" class="center" value="add to db"/>
		</form>
	</div>	