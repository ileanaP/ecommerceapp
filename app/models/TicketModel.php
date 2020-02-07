<?php

class TicketModel extends BaseModel
{
    function __construct($db, $table)
    {
        parent::__construct($db, $table);
    }

    function specificMethod()
    {
        return "specific method is specific";
    }
}