$(document).ready(function(){
    $('.ui.dropdown').dropdown({on:'hover'});

    RemoveTableRow = function(handler) {
        var tr = $(handler).closest('tr');

        tr.fadeOut(400, function(){
            tr.remove(); 
        }); 

        return false;
    };

    $("#elemento-pai-da-tabela").on('click', '.button_delete', function(e){
        e.preventDefault(); 
        var $trPai = $(this).parent().parent(); 
        var id = $trPai.data('id'); 
        $.ajax({ type: "POST", 
            data: { '_id': id }, 
            url: "delete_turma.php", 
            success: function(msg) { 
                $trPai.remove(); 
            } 
    }); 
}); 

})
