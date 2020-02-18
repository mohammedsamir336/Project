<?php if(config('sse.enabled')): ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/event-source-polyfill@1.0.8/src/eventsource.min.js"></script>

    <script>
        if (window.EventSource !== undefined) {

            var es = new EventSource("<?php echo e(route('__sse_stream__')); ?>");

            es.addEventListener("message", function (e) {

                var data = JSON.parse(e.data);

                if (data.message) {
                    new Noty({
                        text: data.message + '<br><small>' + data.time + '</small>',
                        type: data.type,
                        theme: "metroui",
                        closeWith: ['click','button'],
                        layout: "<?php echo e(config('sse.position')); ?>",
                        timeout: <?php echo e(config('sse.timeout') ? 'true' : 'false'); ?>

                    }).show();
                }

            }, false);

            es.addEventListener("error", event => {
                if (event.readyState == EventSource.CLOSED) {
                    console.log("SSE Connection Closed.");
                }
            }, false);

        } else {
            alert("SSE is not supported in this browser!");
        }
    </script>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Project\vendor\sarfraznawaz2005\laravel-sse\src\Views\view.blade.php ENDPATH**/ ?>