<?php
class DateCalculator
{
    private $_begda, $_endda, $_format;

    public function __construct($format = 'd/m/Y H:i:s') // set defualt format incase user doesnt
    {
        $this->_format = $format;
    }

    public function setBegda($begda)
    {
        $this->_begda = DateTime::createFromFormat($this->_format, $begda . ' 00:00:00'); // set 00:00:00 else will defualt to current (not good)
        if (!$this->checkDate($this->_begda))
            throw new Exception('Invalid beginning date');
    }

    public function setEndda($endda)
    {
        $this->_endda = DateTime::createFromFormat($this->_format, $endda . ' 00:00:00'); // set 00:00:00 else will defualt to current (not good)
        if (!$this->checkDate($this->_endda))
            throw new Exception('Invalid end date');
    }

    public function getbegda($format = 'd/m/Y') // set defualt format incase user doesnt
    {
        return $this->_begda->format($format);
    }

    public function getEndda($format = 'd/m/Y')
    {
        return $this->_endda->format($format);
    }

    private function checkDate($date)
    {
        if (!$date) {
            return false;
        } else {
            return true;
        }
    }


    public function diff()
    {

        $interval = $this->_endda->diff($this->_begda)->days;

        return $interval ? $interval - 1 : 0; // check if failed or 0 (same date), so we dont -1 to remove partial begda day.
    }
}
