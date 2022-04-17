$(document).ready(function(){
    $(".btn-confirm-delete").click(function(){
        if (!confirm("Do you want to delete")){
        return false;
        }
    });

    $(".hide-alert-message").fadeTo(2000, 500).slideUp(500, function(){
        $(".hide-alert-message").slideUp(500);
    });
});