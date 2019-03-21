$(document).ready(function() {

    $('#mdelete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var userid = button.data('id');
        var uname = button.data('name');
        var url = $(this).attr('data-url');
        //var token = CSRF_TOKEN;
        var modal = $(this);
        modal.find('#txtid').val(userid);
        modal.find('#uid').val(userid);
        modal.find('.modal-body').text(
            'Are you sure you want to delete ' + uname);
        $("#formdelete").attr("action", url);
        //modal.find(".modal-footer").prepend('<input name="_token" type="hidden" value="'+token+'">');
        //modal.find(".modal-footer").prepend('<input name="_method" type="hidden" value="DELETE">');
    })

    $('#formdelete').submit(function() {
        //var userid = $('#txtid').val();
        //$('#formdelete').attr("action", "route('users.destroy',$user->"+ userid +")");
        $('#formdelete').submit();
    });
});