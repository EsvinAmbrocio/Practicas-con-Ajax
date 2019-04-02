$(function(){
    console.log("jQuery is working");
    $('#producto').submit(function(e) {
        // console.log(e);
        e.preventDefault(); 
        const postData={
            name:$('#nombre').val(),
            price:$('#precio').val(),
            brand:$('#marca').val()
        }
        $.post('../crud/php/insertar.php',postData,function (resonse) {
            // console.log(resonse);
            alert(resonse);
            $('#producto').trigger('reset');
        })
    })
}
);