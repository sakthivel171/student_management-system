<?php
namespace App\Traits;
trait UppercaseAttributes
{
    protected $excludeFromUppercase=['password'];
    public function setAttribute($key,$value)
    {
        if(is_string($value) && !in_array($key,$this->excludeFromUppercase))
            {
                $value=strtoupper($value);
            }
            return parent::setAttribute($key,$value);
    }
}