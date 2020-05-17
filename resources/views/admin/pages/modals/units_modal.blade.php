<div class="modal fade" id="units-modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="units-form">
                <div class="modal-header bg-primary">
                <h4 class="modal-title">Add Units</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="text-light" aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div id="response-message"></div>
                    <div class="form-group">
                        <label for="units">Units *</label>
                        <input type="hidden" id="unitid">
                        <input type="text" class="form-control" name="unit" id="units" placeholder="Enter Units" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="units-form-submit" class="btn btn-primary rounded-0">Submit</button>
                </div>
            </form>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
