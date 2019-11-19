<?php


class TimeTravel
{
    /**
     * @var DateTime
     */
    private $start;

    /**
     * @var DateTime
     */
    private $end;

    public function __construct(DateTime $start, DateTime $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function getTravelInfo()
    {
        $interval = $this->getStart()->diff($this->getEnd());
        return "Il y a " . $interval->format('%y années, %m mois, %d jours, %h heures, %i minutes et %s secondes entre les deux dates');
    }

    public function findDate(DateInterval $interval)
    {
        $findEnd = $this->getStart()->sub($interval);
        return $findEnd->format('d-m-Y');
    }

  /*  public function backToFutureStepByStep(DatePeriod $step):array
    {
        $result = [];
        foreach ($step as $dt) {
            echo $dt->format('M d Y A g:i');
        }
        return $result;
    }
  */
    public function backToFutureStepByStep($step)
    {
        $result = [];
        $dates = new DatePeriod($this->start, $step, $this->end);
        foreach ($dates as $date) {
            $result[] = $date->format("Y-m-d");
        }
        return $result;
    }

    /**
     * @return DateTime
     */
    public function getStart(): DateTime
    {
        return $this->start;
    }

    /**
     * @param DateTime $start
     * @return TimeTravel
     */
    public function setStart(DateTime $start): TimeTravel
    {
        $this->start = $start;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getEnd(): DateTime
    {
        return $this->end;
    }

    /**
     * @param DateTime $end
     * @return TimeTravel
     */
    public function setEnd(DateTime $end): TimeTravel
    {
        $this->end = $end;
        return $this;
    }

}