<?php
/**
 * The Post form
 *
 * @author fwallenborn fwallenborn@gmx.de
 */
namespace Blog\Form;
use Zend\Form\Form;


class PostForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('post');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
         $this->add(array(
            'name' => 'user_id',
            'attributes' => array(
                'type'  => 'hidden',
                'value' => 1
            ),
        ));
        $this->add(array(
            'name' => 'status',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Status',
            ),
        ));
        $this->add(array(
            'name' => 'title',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Title',
            ),
        ));
        $this->add(array(
            'name' => 'content',
            'attributes' => array(
                'type'  => 'textarea',
            ),
            'options' => array(
                'label' => 'Content',
            ),
        ));
        $this->add(array(
            'name' => 'tags',
            'attributes' => array(
                'type' => 'text'
            ),
            'options' => array(
                'label' => 'Tags'
            )
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}

?>
