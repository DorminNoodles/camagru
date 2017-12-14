<?php
class Dispatcher
{
        function __construct()
        {
            $this->request = new Request();
            Router::parse($this->request->url);
        }
}

?>
