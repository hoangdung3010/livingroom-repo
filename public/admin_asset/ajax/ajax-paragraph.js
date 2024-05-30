$(function() {
    // js tinymce
    var editor_config = {
        path_absolute: "/",
        selector: 'textarea.tinymce_editor_init',
        relative_urls: false,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry",

        file_picker_callback: function(callback, value, meta) {
            let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            let y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            let cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
            if (meta.filetype == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.openUrl({
                url: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no",
                onMessage: (api, message) => {
                    callback(message.content);
                }
            });
        }
    };



    // đoạn văn
    $(document).on('click', '#addParagraph', function() {
        // alert('a');
        event.preventDefault();
        //  let wrapActive = $(this).parents('.wrap-load-active');
        let urlRequest = $(this).data("url");
        let i = $('.wrap-paragraph tbody').find('tr').length;
        //  alert(urlRequest);
        $.ajax({
            type: "GET",
            url: urlRequest,
            data: { i: i },
            success: function(data) {
                if (data.code == 200) {
                    let html = data.html;
                    $('.wrap-paragraph tbody').append(html);
                    if ($("textarea.tinymce_editor_init").length) {
                        tinymce.init(editor_config);
                    }
                }
            }
        });
    });



    $(document).on("click", ".btnShowParagraph", function() {

        let contentWrap = $('#loadContent');

        let urlRequest = $(this).data("url");
        $.ajax({
            type: "GET",
            url: urlRequest,
            success: function(data) {
                if (data.code == 200) {
                    let html = data.html;
                    contentWrap.html(html);
                    $('#loadAjaxParent').modal('show');
                    if ($("textarea.tinymce_editor_init").length) {
                        tinymce.init(editor_config);
                    }
                }
            }
        });
    });

    // update paragraph
    $(document).on("submit", '.formEditParagaphAjax', function() {
        event.preventDefault();
        //  let data=$(this).serialize();
        let data = new FormData(this);
        // console.log(data);
        let urlRequest = $(this).data("url");

        let errorSelector = $(this).find('.loadHtmlErrorValide');

        // var form_data = new FormData();

        //  alert(urlRequest);
        $.ajax({
            type: "POST",
            url: urlRequest,
            dataType: "JSON",
            data: data,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.code == 200) {
                    console.log(data.validate);
                    if (data.validate === true) {
                        console.log(data.validate);
                        errorSelector.html(data.htmlErrorValidate);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Lưu không thành công',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        let html = data.html;
                        $('#loadListParagraph').html(html);
                        if ($("textarea.tinymce_editor_init").length) {
                            tinymce.init(editor_config);
                        }
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: "Lưu thành công",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                }
            },
            error: function(response) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Lưu không thành công',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
        return false;
    });

    $(document).on('click', '.deleteParagraph', function() {
        event.preventDefault();
        let $this = $(this);
        Swal.fire({
            title: "Bạn có muốn xóa đoạn văn?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Tôi đồng ý'
        }).then((result) => {
            if (result.isConfirmed) {
                $this.parents('tr').remove();
            }
        })
    });

    $(document).on('click', '.checkParagraph', function() {
        $(this).parents('.form-group').find('.checkParagraph').prop('checked', false);
        $(this).prop('checked', true);
    });

    $(document).on("click", "#addParagraphAjax", function() {
        let contentWrap = $('#loadContent');
        let urlRequest = $(this).data("url");
        $.ajax({
            type: "GET",
            url: urlRequest,
            success: function(data) {
                if (data.code == 200) {
                    let html = data.html;
                    contentWrap.html(html);
                    $('#loadAjaxParent').modal('show');
                    if ($("textarea.tinymce_editor_init").length) {
                        tinymce.init(editor_config);
                    }
                }
            }
        });
    });

    // load paragraph parent_id by type
    $(document).on("change", "#paragraphType", function() {
        let contentWrap = $('#paragraphParent');

        let urlRequest = $(this).data("url");
        let mythis = $(this);
        let value = $(this).val();
        let parentDefault = "<option value='0'>Chọn đoạn văn</option>";
        if (!value) {
            contentWrap.html(parentDefault);
        } else {
            $.ajax({
                type: "GET",
                url: urlRequest,
                data: { 'type': value },
                success: function(data) {
                    if (data.code == 200) {
                        let html = parentDefault + data.html;
                        contentWrap.html(html);
                    }
                }
            });
        }
    });

    // chọn type trước khi chọn đoạn văn cha
    $(document).on("click", "#paragraphParent", function() {
        let value = $('#paragraphType').val();
        if (!value) {
            alert('Bạn phải chọn kiểu đoạn văn trước khi chọn đoạn văn cha');
        }
    });
    //end đoạn văn
});
