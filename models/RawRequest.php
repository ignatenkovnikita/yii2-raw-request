<?php

namespace ignatenkovnikita\request\models;

use Yii;

/**
 * This is the model class for table "raw_request".
 *
 * @property integer $id ID
 * @property string $application_id Application ID
 * @property string $controller_id Controller ID
 * @property string $action_id Action ID
 * @property string $raw Raw
 * @property integer $created_at Created At
 * @property integer $updated_at Updated At
 */
class RawRequest extends \common\models\ActiveRecord
{


    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => \yii\behaviors\TimestampBehavior::class,
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'raw_request';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['raw'], 'string'],
            [['created_at', 'updated_at'], 'default', 'value' => null],
            [['created_at', 'updated_at'], 'integer'],
            [['application_id', 'controller_id', 'action_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'application_id' => Yii::t('common', 'Application ID'),
            'controller_id' => Yii::t('common', 'Controller ID'),
            'action_id' => Yii::t('common', 'Action ID'),
            'raw' => Yii::t('common', 'Raw'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return RawRequestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RawRequestQuery(get_called_class());
    }


    public static function create($data)
    {
        if (!empty($data)) {
            $model = new self();
            $model->application_id = Yii::$app->id;
            $model->controller_id = Yii::$app->controller->id;
            $model->action_id = Yii::$app->controller->action->id;
            if (is_array($data)) {
                $model->raw = json_encode($data);
            } else {
                $model->raw = $data;
            }
            try {
                $model->save();
            } catch (Exception $e) {

            }
        }
    }
}
