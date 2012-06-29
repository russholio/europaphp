<?php

namespace Test\Test\View;
use Europa\View\Json as JsonView;
use Testes\Test\Test;

class Json extends Test
{
    function rendering()
    {
        $view = new JsonView;
        $data = array(
            'data' => array(
                'val1' => 1,
                'val2' => 2
            ),
            'success' => true
        );
        
        $this->assert($view->render($data) === '{"data":{"val1":1,"val2":2},"success":true}', 'The data was not rendered properly.');
    }
}