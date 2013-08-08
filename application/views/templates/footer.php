                <footer>
                    <?php echo lang('app.title').' '.lang('app.version'); ?>
                </footer>
            </div>
        </div>
        <script src="//cdnjs.cloudflare.com/ajax/libs/knockout/2.3.0/knockout-min.js" type="text/javascript"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" type="text/javascript"></script>
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/default.js" type="text/javascript"></script>
        <?php if($scripts): foreach ($scripts as $script): ?>
            <script src="<?php echo base_url().'js'.$script; ?>" type="text/javascript"></script>
        <?php endforeach;endif; ?>
    </body>
</html>