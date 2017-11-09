<?php
// Post Controller 
// RESTful routes: index, new, create, show, edit, update, destroy

class Home extends Controller 
{
    function index($param = []) 
    {   
        $post = new Post;
        $datas = $post->getAllPosts();
        $this->view('home/index', $param, $datas);
 
    }
}