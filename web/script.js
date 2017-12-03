$(document).ready(function () {
    $('#script a').click(function () {
        var href = $(this).attr('href');
        $('#content').load(href);
        return false;
    });
});