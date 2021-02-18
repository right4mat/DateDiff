<?php
class DateCalculator
{
    private $_begda, $_endda;

    public function __construct($begda = '', $endda = '')
    {

        $this->_begda = new DateTime($begda);
        $this->_endda = new DateTime($endda);
    }

    public function setBegda($begda)
    {
        $this->_begda = new DateTime();
        $this->_begda->setTimestamp(strtotime($begda));
    }

    public function setEndda($endda)
    {
        $this->_endda = new DateTime();
        $this->_endda->setTimestamp(strtotime($endda));
    }

    public function getbegda()
    {
        return $this->_begda->format('d/m/Y');
    }

    public function getEndda()
    {
        return $this->_endda->format('d/m/Y');
    }

    private function checkDate($date)
    {
        //negtive -1 check to account for old versions (we dont know which php they may use)

        if ($date && ($date !== -1)) {
            return true;
        } else {
            return false;
        }
    }

    public function diff()
    {
        $interval = (int)$this->_begda->diff($this->_endda)->format('%R%a') * 1; // avoid negative (test 3)
        return $interval ? $interval-1 : 0;// if interval == 0 then the same date (dont take incomplete begda)
    }

    public function help()
    {
        return "Flags: -f, -h, -l" . PHP_EOL;
    }
}
