<?php
namespace dstuecken\Notify\Handler;

use dstuecken\Notify\Interfaces\NotificationInterface;
use dstuecken\Notify\NotificationCenter;

/**
 * Class SmartyHandler
 *
 * Sends notifications directly to the template system.
 *
 * @author  Dennis Stücken <dstuecken@i-doit.com>
 * @package idoit\Notify\Handler
 */
class SmartyHandler extends HeaderHandler
{
	/**
	 * @var  \Smarty
	 */
	private $smarty;

	/**
	 * @var  string
	 */
	private $var;

	/**
	 * Handle a notification.
	 *
	 * @return  boolean
	 */
	public function handle(NotificationInterface $notification, $level)
	{
		if (is_a($notification, 'dstuecken\Notify\AttributeAwareInterface'))
		{
			$options = $notification->attributes();
		}
		else
		{
			$options = array();
		}

		if (is_a($notification, 'dstuecken\Notify\TitleAwareInterface'))
		{
			$options['header'] = $notification->title();
		}

		$this->smarty->append($this->var, $notification);

		return true;
	}


	/**
	 * SmartyHandler constructor.
	 *
	 * @param  \Smarty  $template
	 * @param  string                    $var
	 * @param  integer                   $level
	 */
	public function __construct (\Smarty $template, $templateVariable = 'notification', $level = NotificationCenter::INFO, $identifier = 'Smarty')
	{
        parent::__construct($identifier, $level);

		$this->tpl = $template;
		$this->var = $templateVariable;
	} // function
} // class