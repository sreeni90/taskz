<?php $this->load->view('templates/header');?>

<div class="container">

<div class="row">
  	<div class="col-lg-12 mt-4">
  	  <div class="float-left">
  	    <h2><i class="fas fa-tasks"></i> Tasks Management</h2>
  	  </div>
  	  <div class="float-right">
  	    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-task"> <i class="fas fa-plus"></i> Create Task</button>
  	  </div>
  	</div>
</div>


<table class="table table-hover table-bordered">
	<thead>
	    <tr>
		      <th>Name</th>
		      <th>Description</th>
          <th>Status</th>
          <th class="added-on">Added on</th>
		      <th></th>
	    </tr>
	</thead>
	<tbody>
	</tbody>
</table>

<ul id="pagination" class="pagination-sm justify-content-center"></ul>
<!-- Create Task Modal -->
<div class="modal fade" id="create-task" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Add Task</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
            <form data-toggle="validator" id="create-task-form" action="<?php echo base_url('tasks/add');?>" method="POST">

                <div class="form-group">
                    <input type="text" name="task_name" class="form-control" placeholder="Task Name" data-error="Please enter task name." required />
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <textarea name="description" class="form-control" placeholder="Task Descripption" data-error="Please enter task description." required></textarea>
                    <div class="help-block with-errors"></div>
                </div>
                
                <div class="form-group">
                  <label class="control-label" for="status">Task Status:</label>
                  <select class="form-select form-select-sm" name="task_status" aria-label="Task Status">
                      <option selected value="pending">Pending</option>
                      <option value="done">Done</option>
                  </select>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn task-create btn-success float-right">Save Task</button>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>


<!-- Edit Task Modal -->
<div class="modal fade" id="edit-task" tabindex="-1" role="dialog" aria-labelledby="myEditLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content" id="edit-modal-content">
    </div>
</div>

</div>

</div>

<?php $this->load->view('templates/footer');?>