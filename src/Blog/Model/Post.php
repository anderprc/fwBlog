<?php

namespace Blog\Model;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
/**
 * Post Model
 *
 * @author frankwallenborn fwallenborn@gmx.de
 */
class Post implements InputFilterAwareInterface
{
    public $id;
    public $title;
    public $content;
    public $tags;
    public $status;
    public $user_id; //ZfcUser Id
    public $updated;
    public $created;
    
    
    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->title = (isset($data['title'])) ? $data['title'] : null;
        $this->content  = (isset($data['content'])) ? $data['content'] : null;
        $this->tags  = (isset($data['tags'])) ? $data['tags'] : null;
        $this->status  = (isset($data['status'])) ? $data['status'] : null;
        $this->user_id  = (isset($data['user_id'])) ? $data['user_id'] : null;
        $this->updated  = (isset($data['updated'])) ? $data['updated'] : null;
        $this->created  = (isset($data['created'])) ? $data['created'] : null;
    }
   
  
    
     public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));
            
             $inputFilter->add($factory->createInput(array(
                'name'     => 'user_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));

             $inputFilter->add($factory->createInput(array(
                'name'     => 'status',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));
             
            $inputFilter->add($factory->createInput(array(
                'name'     => 'content',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 10,
                            'max'      => 2000,
                        ),
                    ),
                ),
            )));

             $inputFilter->add($factory->createInput(array(
                'name'     => 'tags',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 10,
                            'max'      => 100,
                        ),
                    ),
                ),
            )));
             
            $inputFilter->add($factory->createInput(array(
                'name'     => 'title',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            )));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}

