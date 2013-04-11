<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?> <!-- наследуем макет от main.php, переопределяя содержимое $content -->
<div id="content" style="background-color:lightgreen;width=100%;">
<?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>