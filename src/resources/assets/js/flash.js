var _notify = _notify || {};

(function ($) {
    "use strict";

    if (typeof toastr === 'undefined') {
        throw new Error("toastr js is required.");
    }

    var notification = function (opts) {
        var defaults = {
            title: function () {
                if (opts.type === undefined) {
                    return "No title";
                }
                // add a title dynamically and automatically
                switch (opts.type) {
                    case "success":
                        return "Action successful.";
                    case "warning":
                        return "Warning!";
                    case "error":
                        return "An error occurred.";
                    case "info":
                        return "Information.";
                    default:
                        return "Information."
                }
            },

            /**
             * Any custom toastr config
             */
            settings: false
        };

        this.opts = $.extend({}, defaults, opts || {});
    };

    notification.prototype.formatMsg = function (message) {
        var txt = '';
        // check if the msg was an object
        if ($.type(message) === "object") {
            $.each(message, function (key, value) {
                txt += '<li>' + value[0] + '</li>';
            });
        } else {
            txt += '<p>' + message + '</p>';
        }
        return txt;
    };

    /**
     * Display toastr notification
     */
    notification.prototype.send = function () {
        var $this = this;
        var opts = $this.opts;
        var settings = $this.opts.settings || {"closeButton": true};
        var msg = this.formatMsg(opts.text);
        switch (opts.type) {
            case "success":
                toastr.success(msg, opts.title, settings);
                break;
            case "warning":
                toastr.warning(msg, opts.title, settings);
                break;
            case "error":
                toastr.error(msg, opts.title, settings);
                break;
            case "info":
                toastr.info(msg, opts.title, settings);
                break;
            default:
                toastr.success(msg, opts.title, settings);
                break;
        }
    };

    _notify = function (options) {
        var obj = new notification(options);
        obj.send();
    };

    return _notify;

})(jQuery);