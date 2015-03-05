<?php
class JobApplication extends DataObject
{
    private static $db = array(
        'Name' => 'Varchar',
        'Email' => 'Varchar',
        'Phone' => 'Varchar',
        'Content' => 'Text',
        'Status' => 'Enum("Applied,Short List, Unsuccessful, Hired", "Applied")'
    );

    private static $has_one = array(
        'Job' => 'Job'
    );

    private static $summary_fields = array(
        'Job.Reference' => 'Job Reference #',
        'Name' => 'Full Name',
        'Email' => 'Email',
        'Phone' => 'Phone',
        'Status' => 'Status'
    );
}
