<?php
class DateCalculator
{
    private $_begda, $_endda, $_format;

    public function __construct($begda = '', $endda = '', $format = 'd/m/Y')
    {

        $this->_begda = strtotime($begda);
        $this->_endda = strtotime($endda);
        $this->_format = $format;
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

    public function getBegda()
    {
        return date($this->_format, $this->_begda);
    }

    public function getEndda()
    {
        return date($this->_format, $this->_endda);
    }

    private function checkDate($date)
    {
        //negtive -1 check to account for old versions
        if (!$date || ($date === -1))
            return false;
        return true;
    }

    public function diff()
    {
        //minus 1 to account for begda incomplete day
        $result = (($this->_endda - $this->_begda) / (60 * 60 * 24)) - 1;
        //check same date to avoid -1
        $isSame = $this->_endda === $this->_begda;
        return $isSame ? 0 : $result;
    }

    public function help()
    {
        return "Flags: -f, -h, -l" . PHP_EOL;
    }
}
// // $mycalc = new DateCalculator('01-11-1972', '01-11-1972');
// // echo $mycalc->diff();
