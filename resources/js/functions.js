function attachEventToClass(selector,handler,event = 'click')
{
    document.querySelectorAll(selector).forEach(item => {
        item.addEventListener(event, handler);
    });
}

function flashMessage(content, state = 'success')
{
    content.icon = 'bi bi-bell';
    
    $.notify(content,{
        template: '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-{0}" role="alert"><button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button><span data-notify="icon"></span> <span data-notify="title">{1}</span> <span data-notify="message">{2}</span><div class="progress" data-notify="progressbar"><div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div><a href="{3}" target="{4}" data-notify="url"></a></div>',
        type: state,
        placement: {
            from: "top",
            align: "center"
        },
        delay: 5000,
        z_index: 1099,
    });
}