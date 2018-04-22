<?php
namespace omidmm\admin\components;

/**
 * Base active record class for progsoft models
 * @package omidmm\admin\components
 */
class ActiveRecord extends \yii\db\ActiveRecord
{
    /** @var string  */
    public static $SLUG_PATTERN ;
               
    /**
     * Get active query
     * @return ActiveQuery
     */
    public static function find()
    {
       return new ActiveQuery(get_called_class());
    }
   public function getClass(){
    return get_called_class();
   }
    /**
     * Formats all model errors into a single string
     * @return string
     */
    public function formatErrors()
    {
        $result = '';
        foreach($this->getErrors() as $attribute => $errors) {
            $result .= implode(" ", $errors)." ";
        }
        return $result;
    }
}