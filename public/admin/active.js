
function initSingleSwitchery(elem) {
    var init = new Switchery(elem,{ size: 'small' });
}


// js switchery multiple




function toggleBoolean(el , url)
{



    var checked = $(el).is(':checked');
    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function (data) {
            toastr.options.closeButton = true;
            toastr.options.closeMethod = 'fadeOut';
            toastr.options.closeDuration = 100;
            toastr.success(data.msg);


        },error: function () {
            $(el).prop('checked',!checked);
            $(el).next().remove();
            initSingleSwitchery(el);
            Swal.fire("خطأ!", "حدث خطأ", "error");
        }
    });
}


