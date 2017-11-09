<?php
// Post Controller
// RESTful routes: index, new, create, show, edit, update, destroy

class Posts extends Controller
{
    function index($param = [])
    {
        if(!isset($_SESSION['id']))
        {
            header("Location: " . URL . "/users/login");
            die();
        }
        $post = new Post;
        $datas = $post->getAllPosts();
        $this->view('posts/index', $param, $datas);
    }

    function new1($param = []) 
    {
        if(!isset($_SESSION['id']))
        {
            header("Location: " . URL . "/users/login");
            die();
        }
        $this->view('posts/new', $param);
    }

    function create($param = [])
    {
        if(!isset($_SESSION['id']))
        {
            header("Location: " . URL . "/users/login");
            die();
        }
        $post = new Post;
        $datas = $post->addPost($param);
        $_SESSION['message'] = "Your post have been created!";
        header("Location: " . URL . "/posts");
    }

    function show($param = [])
    {
        if(!isset($_SESSION['id']))
        {
            header("Location: " . URL . "/users/login");
            die();
        }
        $post = new Post;
        $datas = $post->getPost($param[0]);
        $this->view('posts/show', $param, $datas);
    }

    function edit($param = [])
    {
        if(!isset($_SESSION['id']))
        {
            header("Location: " . URL . "/users/login");
            die();
        }
        $post = new Post;
        $datas = $post->getPost($param[0]);
        $this->view('posts/edit', $param, $datas);
    }

    function update($param = [])
    {
        if(!isset($_SESSION['id']))
        {
            header("Location: " . URL . "/users/login");
            die();
        }
        $post = new Post;
        $post->updatePost($_POST);
        $_SESSION['message'] = "Your post have been updated!";
        header("Location: " . URL . "/posts");
    }

    function destroy($param = [])
    {
        if(!isset($_SESSION['id']))
        {
            header("Location: " . URL . "/users/login");
            die();
        }
        $post = new Post;
        $datas = $post->deletePost($param[0]);
        $_SESSION['message'] = "Post deleted!";
        header("Location: " . URL . "/posts");

    }

}
