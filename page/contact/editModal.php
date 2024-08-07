<!-- editModal.php -->
<div class="modal fade" id="editModal<?php echo $contact['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Edit Task Form -->
                <form action="?pg=edit_task" method="POST">
                    <input type="hidden" name="contact_id" value="<?php echo $contact['id']; ?>">
                    <div class="form-group">
                        <label for="edit_name">Name</label>
                        <input type="text" class="form-control" id="edit_name" name="edit_name" value="<?php echo $contact['name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_company">Company</label>
                        <input type="text" class="form-control" id="edit_company" name="edit_company" value=" <?php echo $contact['company']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="edit_phone">phone</label>
                        <input type="text" class="form-control" id="edit_phone" name="edit_phone" value=" <?php echo $contact['phone']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="edit_email">email</label>
                        <input type="text" class="form-control" id="edit_email" name="edit_email" value=" <?php echo $contact['email']; ?>">
                    </div>
                
                  
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
