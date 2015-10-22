<?php
namespace dstuecken\Notify\Interfaces;

/**
 * This interfaces describes the AbstractNotification look and feel
 *
 * @author Dennis Stücken <dstuecken@synetics.de>
 */
interface NotificationInterface
{
    /**
     * Returns the message itself
     *
     * @return string
     */
    public function message();
}