<?php

class MyTopicSubscriber implements SplSubject
{

    protected $observers = array();

    protected $name;

    protected $event;

    public function __construct($name)
    {
        $this->name = $name;
    }
    /**
     *  Associate an observer
     *
     * @param SplObserver $observer
     * @return MyTopicSubscriber;
     */
    public function attach(SplObserver $observer)
    {
        $observerKey                   = spl_object_hash($observer);
        $this->observers[$observerKey] = $observer;
    }

    /**
     * @param SplObserver $observer
     * @return void
     */
    public function detach(SplObserver $observer)
    {
        $observerKey = spl_object_hash($observer);
        unset($this->observers[$observerKey]);
        // unset($this->linkedList[$observerKey]);
    }

    /**
     * @return void
     */

    public function notify()
    {
        foreach ($this->observers as $key => $value) {
            $this->observers[$key]->update($this);
        }
    }

    /**
     * Set or update event
     * @param $event
     * @return void
     */
    public function setEvent($event)
    {
        $this->event = $event;
        $this->notify();
    }

    /**
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }

    public function getSubscribers()
    {
        return $this->getSubscribers();
    }
}
class Observer implements SplObserver
{
    /**
     * @var  string
     */
    protected $name;

    /**
     * Accepts observer name and priority, default to zero
     */
    public function __construct($name)
    {
        $this->name = $name;
        // $this->priority =$priority;
    }

    /**
     * Receive update from subject and print result
     * @param SplSubject $MyTopicSubscriber
     * @return void
     */
    public function update(SplSubject $MyTopicSubscriber)
    {
        print_r($this->name . ': ' . $MyTopicSubscriber->getEvent());
        echo "\n";
    }

}
$noty = new MyTopicSubscriber('NotificationMyTopicSubscriber');

$email     = new Observer('EmailObserver');
$slack     = new Observer('SlackObserver');
$dashboard = new Observer('DashboardObserver');

// Attach observers
$noty->attach($email);
//$noty->detach($email);
$noty->attach($slack);
$noty->attach($dashboard);
// Set event that will be broadcasted
$noty->setEvent("Server LNX109 is going down");
