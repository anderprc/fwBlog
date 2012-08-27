<?php

namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Blog\Model\Post;
use Blog\Form\PostForm;

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
    
    /**
     * Should be protected (not a part of this blog)
     * @return \Zend\View\Model\ViewModel
     */
    public function adminAction()
    {
         return new ViewModel(array(
            'posts' => $this->getPostTable()->fetchAll(),
        ));
    }
    
    public function viewAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('blog');
        }
        $post = $this->getPostTable()->getPost($id);
        
        return new ViewModel(array('post' => $post));
    }

    public function addAction()
    {
        $form = new PostForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $post = new Post();
            $form->setInputFilter($post->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $post->exchangeArray($form->getData());
                $this->getPostTable()->savePost($post);

                // Redirect to list of albums
                return $this->redirect()->toRoute('blog', array('action' => 'admin'));
            }
        }
        return array('form' => $form);
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
}
?>
