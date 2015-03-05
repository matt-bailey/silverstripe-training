<?php
class Department extends DataObject
{
    private static $db = array(
        'Title' => 'Varchar(100)',
        'Floor' => 'Int(2)'
    );

    private $has_many = array(
        'Staff' => 'StaffPage'
    );
}
