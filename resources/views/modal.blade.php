<div id="DeleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <form action="" id="deleteForm" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="deleteInfo" class="modal-title text-center"></h5>
                </div>
                <div class="modal-body">
                    @method('DELETE')
                    @csrf
                    <p class="text-center">Operation will be irreversible!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="" class="btn btn-success" data-dismiss="modal"
                        onclick="formSubmit()">Yes, Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>