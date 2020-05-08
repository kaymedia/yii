<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\ChangePassword */

$this->title = 'Change Password';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if (!Yii::$app->request->isAjax){ ?>
<div class="element-wrapper">
    <h6 class="element-header">
      User
    </h6>
    <div class="element-box">
<?php } ?>
        <div class="user-create">            
            <?php $form = ActiveForm::begin(['id' => 'form-change']); ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'password_repeat')->passwordInput() ?>

                <?php if (!Yii::$app->request->isAjax){ ?>
                    <div class="form-group">
                        <?= Html::submitButton('Ganti', ['btn btn-success']) ?>
                    </div>
                <?php } ?>
            <?php ActiveForm::end(); ?>
               
        </div>
<?php if (!Yii::$app->request->isAjax){ ?>
    </div>
</div>
<?php } ?>
