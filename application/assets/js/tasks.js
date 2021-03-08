var page = 1;
var current_page = 1;
var total_pages = 0;
var is_ajax_sent = 0;

// call the function on load to load tasks to table
listTasks();

/* all the task list */
function listTasks() {
   $.ajax({
      dataType: 'json',
      url: "/tasks/allCount", // get total rows
      data: {page:page}
    }).done(function(data){
       total_pages = Math.ceil( data.total / 5 ) ; // total pages count
       current_page = page;
       // intial state destroy pagination
       if($('#pagination').data("twbs-pagination"))
         $('#pagination').twbsPagination('destroy');

       $('#pagination').twbsPagination({
            totalPages: (total_pages==0)?1:total_pages,
            visiblePages: current_page,
            startPage:1,
            onPageClick: function (event, pageL) {
                page = pageL;
                if(is_ajax_sent != 0){
                    getTaskData();
                }
            }
        });
        getTaskData(); // get the data
        is_ajax_sent = 1;  // set to true once the data loaded
   });
}

/* Get Page Data*/
function getTaskData() {
    $.ajax({
       dataType: 'json',
       url: "/tasks/all",
       data: {page:page}
	}).done(function(data){
       taskRow(data.data);
    });
}
//  attach data to table of tasks
function taskRow(data) {
    var	rows = '';
    $.each( data, function( key, value ) {
        rows = rows + '<tr>';
        rows = rows + '<td>'+value.name+'</td>';
        rows = rows + '<td>'+value.description+'</td>';
        if( value.status =='pending'){
            rows = rows + '<td><span class="p-1 bg-warning text-white text-uppercase rounded status-text font-weight-bold">Pending</span></td>';   
        }
        else {
            rows = rows + '<td><span class="p-1 bg-success text-white text-uppercase rounded status-text font-weight-bold">Done</span></td>';   
        } 
        rows = rows + '<td title="'+moment( value.date_created , 'YYYY-MM-DD hh:mm:ss')['_d']+'">'+ moment( value.date_created , 'YYYY-MM-DD hh:mm')['_i'];+'</td>';
        rows = rows + '<td data-id="'+value.id+'">';
        rows = rows + '<button data-toggle="modal" data-target="#edit-task" class="btn btn-primary btn-sm edit-task"> <i class="fas fa-pencil-alt"></i> Edit</button> ';
        rows = rows + '</td>';
        rows = rows + '</tr>';
    });
    $("tbody").html(rows);
}
/* Add new Task */
$(".task-create").click(function(e){
    e.preventDefault();
    var form_action = $("#create-task").find("form").attr("action");
    var name = $("#create-task").find("input[name='task_name']").val();
    var description = $("#create-task").find("textarea[name='description']").val();
    var status = $("#create-task").find("select[name='task_status']").val();
    $.ajax({
        dataType: 'json',
        type:'POST',
        url: form_action,
        data:{name:name, description:description,status:status}
    }).done(function(data){
        getTaskData();
        $(".modal").modal('hide');
        toastr.success('Task Added Successfully.', 'Success', {timeOut: 4000});
        $("#create-task-form").trigger("reset");
    });
});

/* Edit Task */
$("body").on("click",".edit-task",function(e){
    e.preventDefault();   
    $.ajax({
        dataType: 'json',
        type:'POST',
        url: "edit/"+$(this).parent("td").data('id')
    }).done(function(data){
        $("#edit-modal-content").html(data);
    });

});

/* Update task */
$("body").on("click","#save-task-edit",function(e){
    e.preventDefault();
    var actionUrl = $("#edit-task").find("form").attr("action");
    var task_name = $("#edit-task").find("input[name='task_name']").val();
    var description = $("#edit-task").find("textarea[name='description']").val();
    var status = $("#edit-task").find("select[name='task_status']").val();

    $.ajax({
        dataType: 'json',
        type:'POST',
        url: actionUrl+"/"+$("#edit-task").find("input[name='task_id']").val(),
        data:{name:task_name, description:description,status:status}
    }).done(function(data){
        if( data.status == true) {
            getTaskData();
            $(".modal").modal('hide');
            toastr.success('Task Modified Successfully.', 'Success', {timeOut: 3000});
        }
        else {
            $(".modal").modal('hide');
            toastr.danger('Error updating Task', 'Error', {timeOut: 3000});
        }        
    });

});