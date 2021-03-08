<div class="modal-header">
        <h4 class="modal-title text-capitalize" id="myEditLabel">Edit Task: <?php echo $task_name;?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            
      </div>
      <div class="modal-body">
            <form data-toggle="validator" action="<?php echo base_url('tasks/update');?>" method="put">
                <input type="hidden" name="task_id" value="{task_id}"/>
                <div class="form-group">
                   <input type="text" name="task_name" placeholder="Task Name" class="form-control" data-error="Please enter task name." value="<?php echo $task_name;?>" required />
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <textarea name="description" class="form-control" placeholder="Task Descripption" data-error="Please enter task description." required >{description}</textarea>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                  <label class="control-label" for="status">Task Status:</label>
                  <select class="form-select form-select-sm" name="task_status" aria-label="Task Status">
                     <?php if($status == 'pending'):?>
                     <option selected value="pending">Pending</option>
                     <option value="done">Done</option>
                     <?php else:?>
                     <option selected value="done">Done</option>
                     <option value="pending">Pending</option>
                    <?php endif;?>
                  </select>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success float-right" id="save-task-edit">Save Task</button>
                </div>
            </form>
      </div>
    </div>
 