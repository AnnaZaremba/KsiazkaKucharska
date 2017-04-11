$(document).ready(function() {
    $('.text').each(function() {
        var tekst = $(this).html();
        tekst = tekst.replace(/(\s)([\S])[\s]+/g,"$1$2&nbsp;"); //jednoznakowe
        tekst = tekst.replace(/(\s)([^<][\S]{1})[\s]+/g,"$1$2&nbsp;"); //dwuznakowe
        $(this).html(tekst);
    });
});
