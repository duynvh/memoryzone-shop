$(document).ready(function(){
    jQuery.ajaxSetup({
        headers: {'X-CSRF-Token': jQuery('meta[name=_token]').attr('content')}
    });

    var btn_del_img = jQuery('#btn-del-img');
    var input_file_img = jQuery('#input-file-img');
    var box_tools = jQuery('.box-tools');

    jQuery("#btn-plus").click(function () {
        var qtyOld = parseInt(jQuery("#qty").val());
        jQuery("#qty").val(qtyOld + 1);
    });

    jQuery("#btn-minus").click(function () {
        var qtyOld = parseInt(jQuery("#qty").val());
        jQuery("#qty").val(qtyOld - 1);
    });


    // upload img
    btn_del_img.hide();

    if (jQuery('.box-tools img').length) {
        input_file_img.hide();
        input_file_img.prop('disabled', true);
    }

    box_tools.on('mouseover', 'img', function () {
        btn_del_img.show();
    });

    box_tools.on('mouseout', 'img', function () {
        btn_del_img.hide();
    });

    btn_del_img.on('mouseover', function () {
        jQuery(this).show();
    });

    btn_del_img.on('mouseout', function () {
        jQuery(this).hide();
    });

    //delete ajax
    btn_del_img.click(function () {
        var url = baseURL + "/admin/delete-image";
        var action_data = jQuery('#form-data').attr('action');
        var token = jQuery("input[name='_token']").attr('value');
        var file_data = input_file_img.prop("files")[0];
        var form_data = new FormData();
        form_data.append("_token", token);
        form_data.append("file", file_data);
        form_data.append("action", action_data);
        ajaxProcess(url, 'post', form_data, function (result) {
            if (jQuery.trim(result) === 'true') {
                btn_del_img.parent().find('img').remove();
                input_file_img.show().val("");
                input_file_img.prop('disabled', false);
            }
        }, 'false');
    });

    //upload ajax
    input_file_img.change(function () {
        var url = baseURL + "/admin/save-temporary";
        var file_data = input_file_img.prop("files")[0];
        var token = jQuery("input[name='_token']").attr('value');
        var form_data = new FormData();
        form_data.append("file", file_data);
        form_data.append("_token", token);
        ajaxProcess(url, 'post', form_data, function (result) {
            if (jQuery.trim(result) !== '') {
                input_file_img.parent().append(result);
                input_file_img.hide();
            }
        }, 'false');
    });

    //sweetalert
    jQuery(".btn-action-delete").click(function () {
        var $this = jQuery(this);
        $('.modal').modal({
            backdrop: true,
            show: true,
        });
        jQuery("#btn-modal-delete").click(function () {
            $this.parent().submit();
        })
    });

    // Notice Message Alert
    var $noticeMessageAlert = jQuery(".notice-message-alert") ;

    if ($noticeMessageAlert.length > 0) {
        var data_text = $noticeMessageAlert.attr('data-text');
        var data = data_text.split(',');
        switch ($.trim(data[2])){
            case 'success':
                swal(data[0],data[1],"success");
                break;
            case 'warning':
                swal(data[0],data[1],"warning");
                break;
            case 'error':
                swal(data[0],data[1],"error");
                break;
        }

    }
});
