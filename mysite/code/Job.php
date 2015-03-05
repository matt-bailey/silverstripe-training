<?php
class Job extends DataObject
{
    private static $db = array(
        'Reference' => 'Varchar(5)',
        'Position' => 'Varchar',
        'ClosingDate' => 'Date',
        'Content' => 'Text',
        'Status' => 'Enum("Draft,Published,Closed", "Draft")',
    );

    private static $has_many = array(
        'Applications' => 'JobApplication'
    );

    private static $summary_fields = array(
        'Reference' => 'Reference #',
        'Position' => 'Position',
        'Status' => 'Status'
    );

    public function getTitle() {
        return $this->Position . ' (#' . $this->Reference . ')';
    }
}
