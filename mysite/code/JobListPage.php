<?php
class JobListPage extends Page
{
    private static $description = 'List of available jobs';
}

class JobListPage_Controller extends Page_Controller
{
    private static $allowed_actions = array(
        'ApplicationForm'
    );

    public function AvailableJobs() {
        return Job::get()
            ->filter('Status', 'Published')
            ->exclude('ClosingDate:LessThan', date('Y-m-d'))
            ->sort('ClosingDate');
    }

    public function ApplicationForm() {
        $fields = FieldList::create(
            TextField::create('Name', 'Full name'),
            EmailField::create('Email', 'Email'),
            PhoneNumberField::create('Phone', 'Contact phone number'),
            DropdownField::create(
                'JobID',
                'Which job are you applying for?',
                $this->AvailableJobs()->map('ID', 'Title')
            )->setEmptyString('(Select)'),
            TextareaField::create('Content', 'Enter your experience and skills')
        );

        $actions = FieldList::create(
            FormAction::create('processApplication', 'Apply')
        );

        $validator = RequiredFields::create(array(
            'Name',
            'Email',
            'Phone',
            'JobID',
            'Content'
        ));

        $form = Form::create(
            $this,
            'ApplicationForm',
            $fields,
            $actions,
            $validator
        );

        return $form;
    }

    public function processApplication($data, Form $form) {
        $application = JobApplication::create();
        $form->saveInto($application);
        $application->write();
        $form->sessionMessage('Thanks for applying.', 'good');
        $this->redirectBack();
    }
}
