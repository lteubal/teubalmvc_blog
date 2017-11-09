<?php
// Post Model

class Post {
    private $database;
    
    public function __construct() 
    {
        $this->database = new Database;        
    }
    // get results from posts
    public function getAllPosts() {
        $this->database->prepare('SELECT * FROM posts ORDER BY created_at desc');
        $this->database->execute();
        return $this->database->fetchAll();
    }

     // get a post with the passed id
    public function getPost($id) {
        $this->database->prepare('SELECT * FROM posts WHERE id = :id');
        $this->database->execute(['id' => $id]);
        return $this->database->fetch();
    }

    //update a post
    public function updatePost($post) {
        $this->database->prepare('UPDATE posts set title = :title, text = :text, author = :author WHERE id = :id');
        $this->database->execute(['title' => $post['title'], 'text' => $post['text'], 'author' => $post['author'], 'id' => $post['id']]);
    }
    // delete a post
    public function deletePost($id) {
        $this->database->prepare('DELETE FROM posts WHERE id = :id');
        $this->database->execute(['id' => $id]);
      
    }

    // create a post
    public function addPost($post) {
        $this->database->prepare('INSERT INTO posts (title, text, author) VALUES (:title, :text, :author)');
        $this->database->execute(['title' => $post['title'], 'text' => $post['text'], 'author' => $post['author']]);         
    }
}