$(function(){
    let editar= false;
    console.log("jQuery is working");
    $('#task-result').hide();

    fetchTasks();

    $('#search').keyup(function(){
        if($('#search').val()){
            let search =$('#search').val();
        $.ajax({
            url:'task-search.php',
            type:'POST',
            data:{search:search},
            success: function(response){
                let task=JSON.parse(response);
                // console.log(task);
                // console.log(response);
                let template ='';
                task.forEach(task => {
                    // console.log(task);
                    template+=
                    `
                    <li>${task.name}</li>
                    ` 
                    ;
                });
                
                $('#container').html(template);
                $('#task-result').show();
            }
        });
        }
        
    });
    $('#task-form').submit(function(e){
        // console.log('submiting');
        const postData={
            name:$('#nombre').val(),
            description:$('#descripcion').val(),
            id:$('#taskId').val()
        };
        let url='';
        if(editar==true){
            url='./task-edit.php';
        }
        else{
            url='./task-add.php';
        }
                $.post(url,postData,function(response){
                    // console.log(response);
                    fetchTasks();
                    $('#task-form').trigger('reset');
                });
        // console.log(postData);
        e.preventDefault();
    });
    function fetchTasks(){
        $.ajax( {
            url:'./task-list.php',
            type:'GET',
            success:function(response){
                // console.log(response);
                let tasks = JSON.parse(response);
                console.log(tasks);
                let template='';
                tasks.forEach(tasks=>{
                    template+=`
                    <tr taskId=${tasks.id}>
                        <td> ${tasks.id}</td>
                        <td><a href="#" class="task-item name">${tasks.name}</a> </td>
                        <td>${tasks.description}</td>
                        <td>
                            <button class=" task-delete btn btn-danger">
                                Eliminar
                            </button>
                        </td>

                    </tr>
                    `
                });
                $('#tasks').html(template);
            }
        });
    }
    $(document).on('click','.task-delete',function(){
        if(confirm('¿seguro que quiere eliminarlo?')){
            let element=$(this)[0].parentElement.parentElement;
            let id = $(element).attr('taskId');
            $.post('./task-delete.php',{id:id}, function(response){
                fetchTasks();
            })
        }
    });

    $(document).on('click','.task-item',function(){
        let element=$(this)[0].parentElement.parentElement;
        let id = $(element).attr('taskId');
        $.post('./task-single.php',{id:id}, function(response){
            // fetchTasks();
            const tasks= JSON.parse(response);
            tasks.forEach(tasks=>{
            $('#nombre').val(tasks.name);
            $('#descripcion').val(tasks.description);
            $('#taskId').val(tasks.id);
            editar=true;
            // console.log(response);
            })
        })
    })
} ); 