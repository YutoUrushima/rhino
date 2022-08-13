<?php
class GetMetadata
{
    public function __construct($access)
    {
        $this->access = $access;
    }
    public function get_apikey()
    {
        return $this->access['X-Rhino-Apikey'] ? $this->access['X-Rhino-Apikey'] : null;
    }
}
