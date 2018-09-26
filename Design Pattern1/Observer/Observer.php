<?php 
// interface SplSubject  {
//     public function attach (SplObserver $observer);

//     public function detach (SplObserver $observer);

//     public function notify ();

// }
// interface SplObserver
// {
//     public function update(SplSubject $subject);
// }

class MyTopicSubscriber implements SplSubject
{
    protected $linkedList = array();

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
        $observerKey = spl_object_hash($observer);
        $this->observers[$observerKey] = $observer;
        $this->linkedList[$observerKey] = $observer->getPriority();
        arsort($this->linkedList);
    }

    /**
     * @param SplObserver $observer
     * @return void
     */
    public function detach(SplObserver $observer)
    {
        $observerKey = spl_object_hash($observer);
        unset($this->observers[$observerKey]);
        unset($this->linkedList[$observerKey]);
    }

    /**
     * @return void
     */
    public function notify()
    {
        foreach ($this->linkedList as $key => $value) {
            $this->observers[$key]->update($this);
        }
    }

    /**
     * Set or update event 
     *
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
     * @var int
     */
    protected $priority = 0;


    /**
     * Accepts observer name and priority, default to zero
     */
    public function __construct($name, $priority=0)
    {
        $this->name =$name;
        $this->priority =$priority;
    }

    /**
     * Receive update from subject and print result
     *
     * @param SplSubject $MyTopicSubscriber
     * @return void
     */
    public function update(SplSubject $MyTopicSubscriber){

        print_r($this->name.': '. $MyTopicSubscriber->getEvent(). PHP_EOL);

    }

    /**
     * Get observer priority
     * 
     * @return int
     */
    public  function getPriority(){
        return $this->priority;
    }

}
$noty = new MyTopicSubscriber('NotificationMyTopicSubscriber');

$email = new Observer('EmailObserver', 50);
$slack = new Observer('SlackObserver', 10);
$dashboard = new Observer('DashboardObserver',30);

// Attach observers
$noty->attach($email);
$noty->attach($slack);
$noty->attach($dashboard);
// Set event that will be broadcasted
$noty->setEvent("Server LNX109 is going down");
?>