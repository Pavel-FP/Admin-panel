$('aside .sidebar').find('a').on('click', function () {
    if ($(this).hasClass('active')) {
        return;
    }
    $('aside .sidebar').find('a').removeClass('active');
    $(this).addClass('active');
});
