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

    private static $editable_fields = array(
        'Status'
    );

    private static $default_sort = 'Created DESC';

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $limitedFields = array('Status');
        if (!Permission::check('Admin')) {
            $limitedFields = $this->config()->editable_fields;
            $editableFields = $fields;
            $fields = $fields->makeReadonly();
            foreach($limitedFields as $fieldName) {
                $fields->replaceField(
                    $fieldName,
                    $editableFields->dataFieldbyName($fieldName)
                );
            }
        }
        return $fields;
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
