@foreach (session('flash_notification', collect())->toArray() as $message)

    <div class="s-session-notification"
         data-message="{{ json_encode($message['message']) }}"
         data-title="{{ isset($message['title']) ? $message['title'] : 'Heads up!' }}" data-type="{{ $message['level'] }}" data-suppress="false">
    </div>
@endforeach
<script>
    var notif = $('.s-session-notification');
    // we have a notification
    if (notif.length) {
        var message = notif.data('message');
        var type = notif.data('type');
        var title = notif.data('title');

        _notify({title: title, text: $.parseJSON(message), type: type});
    }
</script>
{{ session()->forget('flash_notification') }}