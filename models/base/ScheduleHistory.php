<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace d3yii2\d3schedule\models\base;

use d3yii2\d3schedule\models\scheduleHistoryQuery;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the base-model class for table "schedule_history".
 *
 * @property string $id
 * @property integer $subscriber_id
 * @property string $name
 * @property string $params
 * @property string $datetime
 *
 * @property \d3yii2\d3schedule\models\scheduleSubscriber $subscriber
 * @property string $aliasModel
 */
abstract class ScheduleHistory extends ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName(): string
    {
        return 'schedule_history';
    }


    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [['subscriber_id'], 'required'],
            [['subscriber_id'], 'integer'],
            [['params'], 'string'],
            [['datetime'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['subscriber_id'], 'exist', 'skipOnError' => true, 'targetClass' => \d3yii2\d3schedule\models\ScheduleSubscriber::class, 'targetAttribute' => ['subscriber_id' => 'id']],
            [['subscriber_id'],'integer' ,'min' => 0 ,'max' => 65535],
            [['id'],'integer' ,'min' => 0 ,'max' => 4294967295]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('d3schedule', 'ID'),
            'subscriber_id' => Yii::t('d3schedule', 'Subscriber'),
            'name' => Yii::t('d3schedule', 'Name'),
            'params' => Yii::t('d3schedule', 'Params'),
            'datetime' => Yii::t('d3schedule', 'Datetime'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getSubscriber()
    {
        return $this->hasOne(\d3yii2\d3schedule\models\ScheduleSubscriber::class, ['id' => 'subscriber_id']);
    }



    
    /**
     * @inheritdoc
     * @return scheduleHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new scheduleHistoryQuery(get_called_class());
    }

}
