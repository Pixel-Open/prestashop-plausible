<script type="text/javascript">
    window.addEventListener('DOMContentLoaded', function() {
    {foreach from=$events item=event}
        {if $event.event}
            plausibleGoals.{$event.action}('{$event.event}', {$event.params|@json_encode nofilter});
        {/if}
    {/foreach}
    });
</script>