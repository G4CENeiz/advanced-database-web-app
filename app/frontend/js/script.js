$(function() {
    function setDynamicHeight() {
        let navHeight = $('nav').length > 0 ? $('nav').outerHeight(true) : 0;
        console.log(navHeight);
        let footerHeight = $('footer').outerHeight(true);
        console.log(footerHeight);
        let content = $('#content');
        let mainOffset = $('main').length > 0 ? $('main').outerHeight(true) - $('main').height() : 0;
        console.log(mainOffset);
        let totalOffset = navHeight + footerHeight - mainOffset;
        console.log(totalOffset);
        let heightValue = 'calc(100vh - ' + totalOffset + 'px)';
        content.css({'min-height': heightValue});
        console.log('bottom');
    }

    window.addEventListener('load', setDynamicHeight());
    window.addEventListener('resize', setDynamicHeight());

    $('button').on('click', setDynamicHeight());
});