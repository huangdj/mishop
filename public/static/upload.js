//文件上传
var opts = {
    url: "/admin/Photo/upload",
    type: "POST",
    success: function (result) {
        $("input[name='photo_id']").val(result.photo_id);
        $("#img_show").attr("src", result.image_url);
    },
    error: function () {
        alert('文件上传失败');
    }
};

$('#image_upload').fileUpload(opts);