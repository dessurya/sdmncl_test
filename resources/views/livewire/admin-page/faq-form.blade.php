<div>
    <form id="faqForm" class="storeForm">
    	<input type="hidden" class="form-control" name="id" id="id">
    	<input type="hidden" class="form-control" name="action" id="action" value="store">
    	<div class="container">
    		<div class="row">
    			<div class="col">
			    	<div class="form-group">
			    		<label for="question_en">Question En</label>
			    		<input maxlength="155" readonly type="text" class="form-control" name="question_en" id="question_en" aria-describedby="question_en">
			    	</div>
    			</div>
    			<div class="col">
			    	<div class="form-group">
			    		<label for="question_id">Question Id</label>
			    		<input maxlength="155" readonly type="text" class="form-control" name="question_id" id="question_id" aria-describedby="question_id">
			    	</div>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col">
			    	<div class="form-group">
			    		<label for="answer_en">Answer En</label>
			    		<textarea readonly type="text" class="form-control" name="answer_en" id="answer_en" aria-describedby="answer_en" rows="5"></textarea>
			    	</div>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col">
			    	<div class="form-group">
			    		<label for="answer_id">Answer Id</label>
			    		<textarea readonly type="text" class="form-control" name="answer_id" id="answer_id" aria-describedby="answer_id" rows="5"></textarea>
			    	</div>
    			</div>
    		</div>
    		<div class="row">
    			<button class="btn btn-outline-info btn-block" disabled type="submit">Submit</button>
    		</div>
    	</div>
    </form>
</div>
