$(document).ready(function(){
    $(".btn-confirm-delete").click(function(){
        if (!confirm("Do you want to delete")){
        return false;
        }
    });
});