function searchToggle(obj, evt){
    var container = $(obj).closest('.search-wrapper');
    var searchbar = $(obj).closest('.search-input');
        if(!container.hasClass('active')){
            container.addClass('active');
            searchbar.setAttribute('autofocus','true');
            evt.preventDefault();
        }
        else if(container.hasClass('active') && $(obj).closest('.input-holder').length == 0){
            container.removeClass('active');
            // clear input
            container.find('.search-input').val('');
        }
}