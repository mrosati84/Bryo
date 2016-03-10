<?php

namespace Bryo\Database\Contracts;

interface Database
{
    public function connect();
    public function getConnection();
}
