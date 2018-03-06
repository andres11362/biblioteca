$(document).ready(function (params) {

    $('.admin').click(function (){
        $id = $(this).attr('data-id');
        roleC(1, $id);
    });

    $('.biblio').click(function (){
        $id = $(this).attr('data-id');
        roleC(2, $id);
    });

    $('.user').click(function (){
        $id = $(this).attr('data-id');
        roleC(3, $id);
    });

});

function roleC($val, $id){
   $.ajax({
       url: '/changeRole', 
       type: 'put',
       headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       data: {
           'id' : $id,
           'val': $val,
       },
        success: function (data){
            alert(data.mensaje);
        }, 
        error: function(err){
            alert('error');
            console.log(err);
        }
   });
}
