function inittoggle() {
    var content = $('#demos')[0];
    var navigation = $($.find('.navigation'));
    var self = this;
    if (!$.browser.msie) {
        $('#navigationmenu').find('li').css('opacity', 0.95);
        $('#navigationmenu').find('ul').css('opacity', 0.95);
    }
    $('#navigationmenu').jqxMenu({ theme: 'demo', autoSizeMainItems: true, autoCloseOnClick: true });
    $('#navigationmenu').css('visibility', 'visible');

    $(document).bind('contextmenu', function (e) { return false; });
    var me = this;
    navigation.find('.navigationHeader').click(function (event) {
        var $target = $(event.target);
        var $targetParent = $target.parent();
        if ($target.text().indexOf('Introduction') != -1)
            return;

        if ($target.text().indexOf('jQuery Basics') != -1)
            return;

        if ($target.text().indexOf('jqxDataAdapter') != -1)
            return;

        if ($target.text().indexOf('MVVM with Knockout') != -1)
            return;

        if ($target.text().indexOf('Roadmap') != -1)
            return;

        if ($target.text().indexOf('Release History') != -1)
            return;


        if ($targetParent[0].className.length == 0) {
            var $targetParentParent = $($target.parent()).parent();
            var oldChildren = $.data(content, 'expandedElement');
            var oldTarget = $.data(content, 'expandedTarget');

            if (oldTarget != null && oldTarget != event.target) {
                var $oldTarget = $(oldTarget);
                var $oldtargetParentParent = $($oldTarget.parent()).parent();
                if (oldChildren.css('display') == 'block') {
                    oldChildren.css('display', 'none');
                    $oldtargetParentParent.removeClass('navigationItem-expanded');
                    $oldtargetParentParent.find('.navigationContent').css('display', 'none');
                    $oldtargetParentParent.find('.topicimage')[0].src = "../../images/topic.png";
                }
            }

            var children = $targetParentParent.find('.navigationItemContent');
            $.data(content, 'expandedElement', children);
            $.data(content, 'expandedTarget', event.target);

            if (children.css('display') == 'none') {
                children.css({ opacity: 0, display: 'block', visibility: 'visible' }).animate({ opacity: 1.0 }, 0, function () {
                    if (jQuery.browser.msie)
                        $(this).get(0).style.removeAttribute('filter');
                });

                if ($targetParentParent[0].className == 'navigationItem') {
                    $targetParentParent.addClass('navigationItem-expanded');
                    $targetParentParent.find('.navigationContent').css('display', 'block');
                    $targetParentParent.find('.topicimage')[0].src = "../../images/topic_open.png";
                }
            }
            else children.css({ opacity: 1, visibility: 'visible' }).animate({ opacity: 0.0 }, 0, function () {
                children.css('display', 'none');
                $targetParentParent.removeClass('navigationItem-expanded');
                $targetParentParent.find('.navigationContent').css('display', 'none');
                $targetParentParent.find('.topicimage')[0].src = "../../images/topic.png";
            });

        }
        return false;
    });
    var $element = $($.find('.item-expanded'));
    var children = $element.find('.navigationItemContent');
    $.data(content, 'expandedElement', children);
    $.data(content, 'expandedTarget', $element.find('a')[0]);
    $element.removeClass('item-expanded');

    if (children.css('display') == 'none') {
        children.css({ opacity: 0, display: 'block', visibility: 'visible' }).animate({ opacity: 1.0 }, 0, function () {
            if (jQuery.browser.msie)
                $(this).get(0).style.removeAttribute('filter');
        });

        $element.addClass('navigationItem-expanded');
        $element.find('.navigationContent').css('display', 'block');
        $element.find('.topicimage')[0].src = "../../images/topic_open.png";
    }
}