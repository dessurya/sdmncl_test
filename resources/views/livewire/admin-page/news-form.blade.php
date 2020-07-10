<div>
    <form id="newsForm" class="storeForm">
    	<input type="hidden" class="form-control" name="id" id="id">
    	<input type="hidden" class="form-control" name="action" id="action" value="store">
    	<div class="container">
    		<div class="row">
    			<div class="col">
			    	<div class="form-group">
			    		<label for="title_en">Title En</label>
			    		<input maxlength="155" readonly type="text" class="form-control" name="title_en" id="title_en" aria-describedby="title_en">
			    	</div>
    			</div>
    			<div class="col">
			    	<div class="form-group">
			    		<label for="title_id">Title Id</label>
			    		<input maxlength="155" readonly type="text" class="form-control" name="title_id" id="title_id" aria-describedby="title_id">
			    	</div>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col">
			    	<div class="form-group">
			    		<label for="meta_title_en">Meta Title En</label>
			    		<input maxlength="155" readonly type="text" class="form-control" name="meta_title_en" id="meta_title_en" aria-describedby="meta_title_en">
			    	</div>
    			</div>
    			<div class="col">
			    	<div class="form-group">
			    		<label for="meta_title_id">Meta Title Id</label>
			    		<input maxlength="155" readonly type="text" class="form-control" name="meta_title_id" id="meta_title_id" aria-describedby="meta_title_id">
			    	</div>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col">
			    	<div class="form-group">
			    		<label for="meta_description_en">Meta Description En</label>
			    		<input maxlength="155" readonly type="text" class="form-control" name="meta_description_en" id="meta_description_en" aria-describedby="meta_description_en">
			    	</div>
    			</div>
    			<div class="col">
			    	<div class="form-group">
			    		<label for="meta_description_id">Meta Description Id</label>
			    		<input maxlength="155" readonly type="text" class="form-control" name="meta_description_id" id="meta_description_id" aria-describedby="meta_description_id">
			    	</div>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col">
			    	<div class="form-group">
			    		<label for="meta_keyword_en">Meta Keyword En</label>
			    		<input maxlength="155" readonly type="text" class="form-control" name="meta_keyword_en" id="meta_keyword_en" aria-describedby="meta_keyword_en">
			    	</div>
    			</div>
    			<div class="col">
			    	<div class="form-group">
			    		<label for="meta_keyword_id">Meta Keyword Id</label>
			    		<input maxlength="155" readonly type="text" class="form-control" name="meta_keyword_id" id="meta_keyword_id" aria-describedby="meta_keyword_id">
			    	</div>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col">
			    	<div class="form-group">
			    		<label for="description_en">Description En</label>
			    		<textarea readonly type="text" class="form-control" name="content_en" id="content_en" aria-describedby="content_en" rows="5"></textarea>
			    	</div>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col">
			    	<div class="form-group">
			    		<label for="content_id">Description Id</label>
			    		<textarea readonly type="text" class="form-control" name="content_id" id="content_id" aria-describedby="content_id" rows="5"></textarea>
			    	</div>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col">
			    	<div class="form-group">
			    		<label for="picture">Picture</label>
			    		<input readonly type="file" accept=".jpge,.jpg,.png,.gif" class="form-control" name="picture" id="picture" aria-describedby="picture">
			    		​<picture style="display: none;">
		    				<img src="" class="img-fluid img-thumbnail">
		    			</picture>
			    	</div>
    			</div>
    		</div>
    		<div class="row">
    			<button class="btn btn-outline-info btn-block" disabled type="submit">Submit</button>
    		</div>
    	</div>
    </form>
</div>
