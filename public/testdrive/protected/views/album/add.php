<?php
    $this->widget(
        'application.widgets.MTestWidget',
        array(
            'color' => 'pink',
            'width' => '600px'
        )
    );    
?>
Добавление альбома

<?php
    $this->beginWidget(
        'application.widgets.MTestWidget',
        array(
            'height' => '400px'
        )
    ); 
?>
Это виджет!!!
<?php $this->endWidget(); ?>
