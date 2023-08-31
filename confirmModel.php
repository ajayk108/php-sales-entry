<!-- Modal starts -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-2">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Do you want to delete this record..? (YES / NO)</p>
                <p>Note : Effect on other records ..! </p>
            </div>
            <div class="modal-footer">
                <button type="button" value="YES" onclick="deleteData(this.value)" class="btn btn-info">YES</button>
                <button type="button" class="btn btn-info" data-dismiss="modal">NO</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Ends -->