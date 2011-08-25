<?php

namespace Europa;

/**
 * Acts as the top-most parent of all exceptions thrown in Europa.
 * 
 * @category Exceptions
 * @package  Europa
 * @author   Trey Shugart <treshugart@gmail.com>
 * @license  Copyright (c) 2011 Trey Shugart http://europaphp.org/license
 */
class Exception extends \Exception
{
    /**
     * Triggers an error using the exception information. Useful for triggering exceptions inside of __toString().
     * 
     * @return void
     */
    public function trigger()
    {
        trigger_error($this->getMessage(), E_USER_ERROR);
    }
}