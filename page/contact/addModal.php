<!-- Modal -->
<div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTaskModalLabel">Add Contacts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               
                <form action="?pg=add_task" method="post">
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="company">Company</label>
                        <input type="text" class="form-control" id="company" name="company" >
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" >
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" >
                    </div>
                  
                    <button type="submit" class="btn btn-primary">Add Task</button>
                </form>
            </div>
        </div>
    </div>
</div>
