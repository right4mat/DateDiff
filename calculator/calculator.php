<?php
class DateCalculator
{
    private $_begda, $_endda, $_format;

    public function __construct($format = 'd/m/Y')
    {
        $this->_format = $format;
    }

    public function setBegda($begda)
    {
        $this->_begda = DateTime::createFromFormat($this->_format, $begda);
        if(!$this->checkDate($this->_begda))
            throw new Exception('Invalid beginning date');
    }

    public function setEndda($endda)
    {
        $this->_endda = DateTime::createFromFormat($this->_format, $endda);
        if(!$this->checkDate($this->_endda))
            throw new Exception('Invalid end date');
    }

    public function getbegda()
    {
        return $this->_begda->format($this->_format);
    
    }

    public function getEndda()
    {
        return $this->_endda->format($this->_format);
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
        $interval = (int)$this->_begda->diff($this->_endda)->format('%a'); 
        return $interval ? $interval-1 : 0; 
    }

}
