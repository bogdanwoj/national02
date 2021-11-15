<?php
namespace Classes;

class Comment extends Base
{
    public $articleId;

    public $userId;

    public $comment;

    public static function getTableName()
    {
       return 'comments';
    }

    public function getUsername()
    {
        return User::find($this->userId);
    }


}