$(window).load(function(){
    $('form').submit(function(e) {
        var error = false;
        e.preventDefault();
        
        var requiredInput = $('input').filter('.required');
        $.each(requiredInput, function(i,o) {
            var name = $(o).attr('name');
            var content = $("input[name='"+name+"']").val();
            $("#"+name).removeClass('has-error');
            if (content == '') {
                $("#"+name).addClass('has-error');
                error = true;
            }
        })

        var requiredTextarea = $('textarea').filter('.required');
        $.each(requiredTextarea, function(i,o) {
            var name = $(o).attr('name');
            var editorContent = tinyMCE.get(name).getContent();
            $("#"+name).removeClass('has-error');
            if (editorContent == '') {
                $("#"+name).addClass('has-error');
                error = true;
            }
        })

        if (!error) {
            this.submit();
        }
    });
});