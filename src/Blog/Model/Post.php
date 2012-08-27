<?php

namespace Blog\Model;

/**
 * Post Model
 *
 * @author frankwallenborn fwallenborn@gmx.de
 */
class Post {
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
}

