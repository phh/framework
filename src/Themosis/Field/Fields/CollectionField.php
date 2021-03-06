<?php
namespace Themosis\Field\Fields;

use Themosis\View\ViewFactory;

class CollectionField extends FieldBuilder implements IField
{
    /**
     * Define a collection field instance.
     *
     * @param array $properties
     * @param ViewFactory $view
     */
    public function __construct(array $properties, ViewFactory $view)
    {
        parent::__construct($properties, $view);
        $this->setType(); // Set in parent class - setup the type of media to insert.
        $this->setLimit(); // Set in parent class - setup the number of media files to insert.
        $this->fieldType();
    }

    /**
     * Method to override that defined the input type
     * that handles the value.
     *
     * @return void
     */
    protected function fieldType()
    {
        $this->type = 'collection';
    }

    /**
     * Method that handle the field HTML code for
     * metabox output.
     *
     * @return string
     */
    public function metabox()
    {
        return $this->view->make('metabox._themosisCollectionField', ['field' => $this])->render();
    }

    /**
     * Method that handle the field HTML code for
     * page settings output.
     *
     * @return string
     */
    public function page()
    {
        return $this->metabox();
    }

    /**
     * Handle the HTML code for user output.
     *
     * @return string
     */
    public function user()
    {
        return $this->metabox();
    }


}