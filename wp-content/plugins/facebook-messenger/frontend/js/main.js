(function () {
    var originWinH = window.innerHeight;
    var originTop = 0;
    var winH = window.innerHeight;
    var winW = jQuery(window).width();
    var centerPoint = winW / 2;
    var isDragging = false;

    var $fbIcon = jQuery('#fbmsg-icon');
    if(!$fbIcon.length) return;
    var $fbDropZone = jQuery('#fbmsg-drop');
    var $fbDropZoneBorder = jQuery('.fbmsg-border');
    var $fbContent = jQuery('#fbmsg-content');

    var MOVE_SPEED = 200;
    var FADE_SPEED = 200;
    var V_SPACE = $fbIcon.data().vspace;
    var H_SPACE = $fbIcon.data().hspace;
    var SIDE = $fbIcon.data().side;
    var POSITION = $fbIcon.data().position;
    var ICON_WIDTH = $fbIcon.outerWidth();
    var ICON_HEIGHT = $fbIcon.outerHeight();

    setSide(SIDE);
    setPosition(POSITION);
    events();
    initDragAndDrop();
    $fbIcon.fadeTo(FADE_SPEED, 1);

    function initDragAndDrop() {
        $fbIcon.draggable({
            snap: '.fbmsg-snap',
            snapMode: 'inner',
            delay: 100,
            drag: function () {
                isDragging = true;
            },
            start: function (event, ui) {
                var $elem = jQuery(this);
                calcSize();

                TweenMax.to($fbDropZoneBorder, 0.3, {
                    bottom: 15,
                    ease: Back.easeOut
                });
            },
            stop: function (event, ui) {
                var $elem = jQuery(this);
                var posTop = $elem.position().top;
                var posLeft = $elem.position().left;
                var x, y;
                calcSize();
                isDragging = false;

                if (posTop > winH - ICON_HEIGHT) {
                    y = winH - (ICON_HEIGHT + V_SPACE);
                }
                if (posTop < 0) {
                    y = V_SPACE;
                }

                if (posLeft > centerPoint) {
                    x = (winW - ICON_WIDTH - H_SPACE);
                } else {
                    x = H_SPACE;
                }

                TweenMax.to($elem, 0.3, {left: x, top: y, ease: Back.easeOut, onComplete: function(){
                    tranformValue($elem);
                    TweenMax.to($fbDropZoneBorder, 0.3, {
                        bottom: -50,
                        ease: Back.easeOut
                    });
                }});
            }
        });

        $fbDropZone.droppable({
            accept: '#fbmsg-icon',
            drop: function (event, ui) {
                $fbIcon.hide();
            },
            over: function (event, ui) {
                $fbDropZoneBorder.addClass('anim-zoom-in');
                console.log('over');
            },
            out: function (event, ui) {
                $fbDropZoneBorder.removeClass('anim-zoom-in');
            }
        });
    }

    function tranformValue(element) {
        element.css({
            bottom: winH - element.outerHeight() - element.position().top,
            top: 'auto'
        });
    }

    function setPosition(position) {
        var y;
        switch (position) {
            case 'top':
                y = V_SPACE;
                break;
            case 'middle':
                y = (winH / 2) - (ICON_HEIGHT / 2);
                break;
            case 'bottom':
                y = winH - (ICON_HEIGHT + V_SPACE);
                break;
        }
        $fbIcon.css({
            top: y
        });
        tranformValue($fbIcon);
    }

    function setSide(side) {
        var x;
        switch (side) {
            case 1: // left
                x = H_SPACE;
                break;
            case 0: // Right
                x = winW - (ICON_WIDTH + H_SPACE);
                break;
        }
        $fbIcon.css({
            left: x
        });
    }

    function events() {
        jQuery(document).on('click', function () {
            if ($fbIcon.has(event.target).length == 0 && !$fbIcon.is(event.target)) {
                if ($fbIcon.hasClass('is-open')) {
                    hideContent();
                }
            }
        });

        $fbIcon.on('mouseup', function (e) {
            var _this = jQuery(this);

            if (isDragging) return;

            calcSize();

            if (_this.hasClass('is-open')) {
                hideContent();
            } else {
                originTop = _this.position().top;
                showContent();
            }
        });
    }

    function showContent(callback) {
        TweenMax.to($fbIcon, 0.4, {
            bottom: winH - ICON_HEIGHT - 20,
            ease: Back.easeOut.config(1),
            onComplete: function () {
                tranformValue($fbIcon);

                if ($fbIcon.position().left > centerPoint) {
                    $fbContent.css({
                        right: 5,
                        left: 'auto'
                    });
                } else {
                    $fbContent.css({
                        right: 'auto',
                        left: 5
                    });
                }

                $fbContent.css({
                    top: ICON_HEIGHT + $fbIcon.position().top + 10,
                }).slideDown(200, function () {
                    if (typeof callback === 'function') {
                        callback();
                    }
                });
            }
        });
        $fbIcon.addClass('is-open');
    }

    function hideContent(callback) {
        $fbContent.slideUp(200, function () {
            TweenMax.to($fbIcon, 0.4, {
                top: originTop,
                ease: Back.easeOut.config(1),
                onComplete: function () {
                    tranformValue($fbIcon);
                }
            });

            $fbIcon.removeClass('is-open');

            if (typeof callback === 'function') {
                callback();
            }
        });
    }

    function calcSize() {
        winH = window.innerHeight;
        winW = jQuery(window).width();
        centerPoint = winW / 2;
    }
})();