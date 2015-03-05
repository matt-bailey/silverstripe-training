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

    private static $default_sort = 'Created DESC';

    public function getTitle() {
        return $this->Position . ' (#' . $this->Reference . ')';
    }

    public function canEdit($member = null) {
        return Permission::check('CMS_ACCESS_JobAdmin');
    }

    public function canDelete($member = null) {
        return Permission::check('CMS_ACCESS_JobAdmin');
    }

    public function canView($member = null) {
        return Permission::check('CMS_ACCESS_JobAdmin');
    }
}
