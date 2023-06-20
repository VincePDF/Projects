//Notification-Message on Page Edit/Create
const toastTrigger = document.getElementById('button-add')
const toastLive = document.getElementById('notificationToast')
if (toastTrigger) {
    toastTrigger.addEventListener('click', () => {
    const toast = new bootstrap.Toast(toastLive)

    toast.show();
    move();
    })
}

var i = 0;
function move() {
    if (i == 0) {
        i = 1;
        var elem = document.getElementById("myBar");
        var width = 1; 
        var id = setInterval(frame, 10);
        function frame() {
            if (width >= 100) {
                clearInterval(id);
                i = 0;
            } else {
                width++;
                elem.style.width = width + "%";
            }
        }
    }
}

//Delete Function in customerdatabase
let selectedId = 0;
function GetRowId(buttonId){
    selectedId = buttonId;
}
function deleteSelectedId() {
    window.location = 'delete.php?id=' + selectedId; 
}

//Search Function
var $rows = $('#table tr');
$('#search').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});