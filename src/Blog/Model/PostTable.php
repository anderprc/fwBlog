<?php

// module/Album/src/Album/Model/AlbumTable.php:
namespace Blog\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;

class PostTable extends AbstractTableGateway
{
    protected $table ='post';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new Post());
        $this->initialize();
    }

    public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }

    public function getPost($id)
    {
        $id  = (int) $id;
        $rowset = $this->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
   
        
        return $row;
    }

    public function savePost(Post $post)
    {
        $data = array(
            'user_id' => $post->user_id,
            'title'  => $post->title,
            'content' => $post->content,
            'created' => $post->created,
            'updated' => $post->updated,
            'status' => $post->status,
            'tags' => $post->tags
        );
        $id = (int)$post->id;
        if ($id == 0) {
            $this->insert($data);
        } else {
            if ($this->getPost($id)) {
                //tags  could be an array.
             
                
                $this->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteAlbum($id)
    {
        $this->delete(array('id' => $id));
    }
}