<?php 
echo Html::a('Click me', ['ajax/simple'], [
        'id' => 'ajax_link_01',
        'data-on-done' => 'simpleDone',
    ]
);
echo Html::tag('div', '...', ['id' => 'ajax_result_01']);
 
$this->registerJs("$('#ajax_link_01').click(handleAjaxLink);", \yii\web\View::POS_READY);
