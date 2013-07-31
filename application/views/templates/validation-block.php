<?php if(validation_errors()): ?>
<div class="row">
    <div class="span12">
        <div class="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Something is wrong</h4>
            <ul>
            <?php echo validation_errors('<li>','</li>'); ?>
            </ul>
        </div>
    </div>
</div>
<? endif; ?>