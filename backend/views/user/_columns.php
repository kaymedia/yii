<?php
use yii\helpers\Url;
use yii\helpers\Html;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'username',
    ],
   
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'email',
    ],

    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'statusUser',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'header' => 'Password',
        'template' => '{password}{status}',
        'buttons' => [
            
            "status" => function ($url, $model, $key) {
                if($model->status == 10){
                    $label = 'Non Aktifkan';
                    $class = 'btn btn-danger btn-block';
                    $link = 'non-aktif';
                    $warning = 'Anda Yakin Ingin Menonaktifkan User';
                }else{
                    $label = 'Aktifkan';
                    $class = 'btn btn-info btn-block';
                    $link = 'aktif';
                    $warning = 'Anda Yakin Ingin Mengaktifkan User';

                }
                return Html::a($label, [$link,'id'=>$model->id], ['role'=>'modal-remote','title'=>'Delete', 
                'class' => $class,
                'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                'data-request-method'=>'post',
                'data-toggle'=>'tooltip',
                'data-confirm-title'=>'Peringatan?',
                'data-confirm-message'=> $warning ]);
            },
            "password" => function ($url, $model, $key) {
                return Html::a('Ganti Password', ['ganti-password','id'=>$model->id], ['role'=>'modal-remote','class' =>'btn btn-primary btn-block' ]);
            },
        ],
        'vAlign'=>'middle',
    ],
   
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   