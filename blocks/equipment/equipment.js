jQuery(document).ready(function($) {
    function activateTab(tabId) {
        var $tabNav = $('.acf-tabs-nav li[data-tab="' + tabId + '"]');
        var $tabContent = $('#' + tabId);

        if ($tabNav.length && $tabContent.length) {
            $tabNav.addClass('active').siblings().removeClass('active');
            $tabContent.addClass('active').siblings().removeClass('active');
        }
    }

    // Kliknięcie w tab
    $('.acf-tabs-nav li').on('click', function() {
        var tabId = $(this).data('tab');
        
        activateTab(tabId);

        // zmiana hash w URL
        if (history.pushState) {
            history.pushState(null, null, '#' + tabId);
        } else {
            location.hash = '#' + tabId;
        }
    });

    // Przy starcie strony – sprawdź hash
    var initialHash = window.location.hash.substring(1);
    if (initialHash) {
        activateTab(initialHash);
    }
});
