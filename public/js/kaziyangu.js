
$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});
function markNotificationAsRead(){
    $.get('/markAsRead');
}
