{if $action and $event }
<script type="text/javascript">
    window.addEventListener('DOMContentLoaded', function() {
        plausibleGoals.{$action}('{$event}', {$params|@json_encode nofilter});
    });
</script>
{/if}