<?php

namespace Europa\View;

/**
 * Allows a script to render files.
 * 
 * @category Views
 * @package  Europa
 * @author   Trey Shugart <treshugart@gmail.com>
 * @license  Copyright (c) 2011 Trey Shugart http://europaphp.org/license
 */
interface ViewScriptInterface extends ViewInterface
{
    /**
     * Sets the script to be rendered.
     * 
     * @param string $script The script to render.
     * 
     * @return ViewScriptInterface
     */
    public function setScript($script);
    
    /**
     * Returns the current script.
     * 
     * @return string
     */
    public function getScript();
}