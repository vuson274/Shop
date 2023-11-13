$(document).on('click', '.edituser', function (){
    var array = $(this).attr('array');
    var obj = JSON.parse(array);
    $('#eid').val(obj['id']);
    $('#ename').val(obj['name']);
    $('#eemail').val(obj['email']);
    $('#ephone').val(obj['phone']);
    $("#modalupdate").modal('show');
});

$(document).on('click', '.editcategory', function (){
    var array = $(this).attr('array');
    var obj = JSON.parse(array);
    $('#eid').val(obj['id']);
    $('#ename').val(obj['name']);
    $("#modalupdate").modal('show');
});