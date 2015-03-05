<?php
class StaffPage extends Page
{
    private static $description = 'A staff member';

    private static $can_be_root = false;

    private static $db = array(
        'JobTitle' => 'Varchar(255)',
        'Phone' => 'Varchar(11)',
        'Email' => 'Varchar(255)'
    );

    private static $has_one = array(
        'Photo' => 'Image',
        'Department' => 'Department'
    );

    public function getCMSFields() {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab(
            'Root.Main',
            array(
                TextField::create('JobTitle'),
                DropdownField::create(
                    'DepartmentID',
                    'Department',
                    Department::get()->map('ID', 'Title')
                )->setEmptyString('(Select)'),
                TextField::create('Phone'),
                EmailField::create('Email'),
                UploadField::create('Photo')
            ),
            'Content'
        );

        $fields->renameField('Title', 'Staff Name');

        return $fields;
    }

    public function ObfuscateEmail() {
        return Email::obfuscate($this->Email, 'hex');
    }
}

class StaffPage_Controller extends Page_Controller
{

}
