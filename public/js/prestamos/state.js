$(document).ready(function(){
    $('.rec').click(function (){
        $id = $(this).attr('data-id');
        prestamo($id);
    });

    $('.dev').click(function (){
        $id = $(this).attr('data-id');
        devolucion(2, $id);
    });
});

function prestamo($id) {
    $.ajax({
        url: '/prestamoState', 
        type: 'put',
        headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'id' : $id,
        },
         success: function (data){
            alert(data.mensaje);
            location.reload();
         }, 
         error: function(err){
            alert(err.responseJSON.mensaje);
            console.log(err.responseJSON);
         }
    });
}

function devolucion($id) {
    $.ajax({
        url: '/devolucionState', 
        type: 'put',
        headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'id' : $id,
        },
         success: function (data){
            alert(data.mensaje);
            location.reload();
         }, 
         error: function(err){
            alert(err.responseJSON.mensaje);
            console.log(err.responseJSON);
         }
    });
}