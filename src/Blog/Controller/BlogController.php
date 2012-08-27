<?php

namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BlogController extends AbstractActionController
{
    protected $postTable;
    
    public function getPostTable()
    {
        if (!$this->postTable) {
            $sm = $this->getServiceLocator();
            $this->postTable = $sm->get('Blog\Model\PostTable');
        }
        return $this->postTable;
    }
    public function indexAction()
    {
         return new ViewModel(array(
            'posts' => $this->getPostTable()->fetchAll(),
        ));
    }

    public function addAction()
    {
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
}
?>
