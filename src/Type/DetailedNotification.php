<?php
namespace dstuecken\Notify\Type;

/**
 * Class DetailedNotification
 *
 * @author  Dennis Stücken <dstuecken@i-doit.com>
 * @package dstuecken\Notify\NotificationType
 */
class DetailedNotification
    extends AbstractNotification
{
    /**
     * Additional notification attributes
     *
     * @var array
     */
    protected $attributes = array();

    /**
     * Returns a parameter.
     *
     * @param string $id
     *
     * @return mixed
     */
    public function parameter($id)
    {
        if (isset($this->attributes[$id]))
        {
            return $this->attributes[$id];
        }

        return '';
    }

    /**
     * @inheritDoc
     */
    public function attributes()
    {
        return $this->attributes;
    }

    /**
     * @param string $message    The notification message
     * @param string $title      The notification title
     * @param array  $attributes Optional attributes
     */
    public function __construct($message, $title = '', $attributes = array())
    {
        parent::__construct($message, $title);
        $this->attributes = $attributes;
    }

}