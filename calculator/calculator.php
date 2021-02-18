<?php
class DateCalculator
{
    private $_begda, $_endda;

    public function __construct($begda = '', $endda = '')
    {

        $this->_begda = strtotime($begda);
        $this->_endda = strtotime($endda);
        $this->checkDate($this->_begda);
        $this->checkDate($this->_endda);
    }

    public function setBegda($begda)
    {

        $this->_begda = strtotime($begda);
        if (!$this->checkDate($this->_begda)) {
            throw new Exception('Invalid date');
        }
    }

    public function setEndda($endda)
    {

        $this->_endda = strtotime($endda);
        if (!$this->checkDate($this->_endda)) {
            throw new Exception('Invalid date');
        }
    }

    public function getbegda()
    {
        echo $this->_begda.PHP_EOL;
        return date("d/m/Y", $this->_begda);
    }

    public function getEndda()
    {
        echo $this->_endda.PHP_EOL;
        return date("d/m/Y", $this->_endda);
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
        //minus 1 to account for begda incomplete day
        $result = ($this->_endda - $this->_begda) / (60 * 60 * 24);
        //check same date to avoid -1
        $isSame = $this->_endda === $this->_begda;
        return $isSame ? 0 : abs($result) - 1; //make sure always postive (test case 3)
    }
}
