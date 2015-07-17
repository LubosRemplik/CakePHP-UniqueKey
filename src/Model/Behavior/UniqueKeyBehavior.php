<?php
namespace Lubos\UniqueKey\Model\Behavior;

use Cake\Event\Event;
use Cake\ORM\Behavior;
use Cake\ORM\Entity;

class UniqueKeyBehavior extends Behavior
{

    protected $_defaultConfig = [
        'field' => 'uid',
    ];

    protected $_numbers;

    /**
     * Initialize method
     *
     * @param array $config Config.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->_numbers = $this->_table->find()
            ->combine('id', $config['field'])
            ->toArray();
    }

    /**
     * BeforeSave callback
     *
     * @param \Cake\Event\Event $event Event instance.
     * @param \Cake\ORM\Entity $entity Entity instance.
     * @return bool
     */
    public function beforeSave(Event $event, Entity $entity)
    {
        $config = $this->config();
        if (!isset($entity->{$config['field']})) {
            $entity->{$config['field']} = $this->uniqueKey();
        }
        return true;
    }

    /**
     * UniqueKey method
     *
     * @param int $append Append with unique number
     * @return int
     */
    public function uniqueKey($append = 1)
    {
        $config = $this->config();
        $number = date('ymd') . sprintf('%03d', $append);
        if (in_array($number, $this->_numbers)) {
            return $this->uniqueKey(++$append);
        }
        return $number;
    }
}
