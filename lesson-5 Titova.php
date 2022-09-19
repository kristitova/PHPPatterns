<?php

//1 задание

interface GeneralSendInterface
{
    public function send($notification);
}

class SendNotification implements GeneralSendInterface
{
    public function send($notification)
    {
        // TODO: Implement send() method.
    }
}

abstract class SendNotificationDecorator implements GeneralSendInterface
{
    protected $notification;
    public function __construct(GeneralSendInterface $notification)
    {
        $this->notification = $notification;
    }
}

class SMSendNotification extends SendNotificationDecorator
{
    public function send($notification)
    {
        //TODO: send notification on SMS method
    }
}

class EmailSendNotification extends SendNotificationDecorator
{
    public function send($notification)
    {
        //TODO: send notification on Email method
    }
}

class ChromeNotifSendNotification extends SendNotificationDecorator
{
    public function send($notification)
    {
        //TODO: send notification on Chrome notificaton method
    }
}


$notification = new ChromeNotifSendNotification(new EmailSendNotification(new SMSendNotification(new SendNotification())));

$notification->send('some text');

//2 задание

interface ISquare
{
    function squareArea(float $sideSquare);
}
interface ICircle
{
    function circleArea(float $circumference);
}

class SquareAreaLib
{
    public function getSquareArea(float $diagonal)
    {
        $area = ($diagonal ** 2) / 2;
        return $area;
    }
}
class CircleAreaLib
{
    public function getCircleArea(float $diagonal)
    {
        $area = (M_PI * $diagonal ** 2) / 4;
        return $area;
    }
}

class CountSquareAdapter implements ISquare
{
    private $countSquareAdapter;
    public function __construct(SquareAreaLib $countSquareAdapter)
    {
        $this->countSquareAdapter = $countSquareAdapter;
    }

    public function squareArea(float $sideSquare): float
    {
        $diagonal = $sideSquare * sqrt(2);
        return $this->countSquareAdapter->getSquareArea($diagonal);
    }
}

$countSquare = (new CountSquareAdapter(new SquareAreaLib))->squareArea(2);

class CountCircleAreaAdapter implements ICircle
{
    private $countCircleAreaAdapter;
    public function __construct(CircleAreaLib $countCircleAreaAdapter)
    {
        $this->countCircleAreaAdapter = $countCircleAreaAdapter;
    }

    public function circleArea(float $circumference): float
    {
        $diagonal = $circumference / M_PI;
        return $this->countCircleAreaAdapter->getCircleArea($diagonal);
    }
}

$countCircleArea = (new CountCircleAreaAdapter(new CircleAreaLib))->circleArea(2);
