(function ($) {

    $.fn.scrollableMDLTabs = function () {

        var right = this.children(".mdl-tabs__container").children(".scrollindicator.scrollindicator--right"),
                left = this.children(".mdl-tabs__container").children(".scrollindicator.scrollindicator--left"),
                container = this.children(".mdl-tabs__container").children(".mdl-tabs__linkContainer"),
                step = 40,
                that = this,
                thatid = that.attr("id");

        function disabling() {
            left.removeClass("disabled");
            right.removeClass("disabled");

            sl = container.scrollLeft();
            cw = container.width();
            bw = that.width();

            if (sl <= 0) {
                left.addClass("disabled");
            }

            if (bw > cw && sl + cw >= bw + 32) {
                right.addClass("disabled");
            }
        }

        function showIndicator() {
            if (container.width() < 645) {
                that.addClass("scrollNeeded");
            } else {
                that.removeClass("scrollNeeded");
            }
        }

        function scroll(step) {
            container.scrollLeft(container.scrollLeft() + step);
            container.trigger("scroll");
        }

        $(window).resize(function () {
            showIndicator();
        });

        $(".mdl-tabs__linkContainer").on("scroll", function () {
            disabling();
        });

        $(document).on("click", "#" + thatid + " .scrollindicator.scrollindicator--right", function () {
            scroll(step);
        });
        $(document).on("click", "#" + thatid + " .scrollindicator.scrollindicator--left", function () {
            scroll(-step);
        });


        showIndicator();
        disabling();
    };
}(jQuery));

$(document).ready(function () {
    $("#tabs1").scrollableMDLTabs();
    $("#tabs2").scrollableMDLTabs();
});
