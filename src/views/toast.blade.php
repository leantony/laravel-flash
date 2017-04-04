@if (session()->has('flash_notification.message'))

    <div id="notification_zone" data-message="{{ json_encode(session('flash_notification.message')) }}"
         data-title="{{ 'Heads up:' }}" data-type="{{ session('flash_notification.level') }}" data-suppress="false">
    </div>

    <script>
        var notif = $('#notification_zone');
        // we have a notification
        if (notif.length) {
            var successTypes = ['success', 'info', 'warning'];
            var message = notif.data('message');
            var title = notif.data('title');
            var type = notif.data('type');
            var isSuccess = $.inArray(type, successTypes);
            var suppressNotification = notif.data('suppress');

            // message will always be json encoded
            message = leantony.utils.processMessageObject($.parseJSON(message));

            leantony.notify({text: message, type: type});
        }
    </script>
@endif