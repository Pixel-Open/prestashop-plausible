<script type="text/javascript">
    window.addEventListener('DOMContentLoaded', function() {
    {foreach from=$events item=event}
        plausibleGoals.{$event.action}('{$event.event}', {$event.params|@json_encode nofilter});
    {/foreach}
    });
</script>