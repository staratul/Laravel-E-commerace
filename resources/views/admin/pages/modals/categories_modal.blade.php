<div class="modal fade" id="modal-default" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="categories-form">
                <div class="modal-header bg-primary">
                <h4 class="modal-title">Add Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="text-light" aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div id="response-message"></div>
                    <div class="form-group">
                        <label for="category">Category *</label>
                        <input type="text" class="form-control" name="category" id="category" placeholder="Enter Category" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description *</label>
                        <textarea name="description" id="description" class="form-control" placeholder="Enter Category" required></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="category-form-submit" class="btn btn-primary rounded-0">Submit</button>
                </div>
            </form>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
