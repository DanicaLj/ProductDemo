<?php
require 'Setup/Connection.php';
require 'Model/Comment.php';

class Action{

    protected $connection;
    protected $comment;
    protected $view;
    
    public function __construct()
    {
        $this->view = new View();
        $this->connection = new Connection();
        $this->comment = new Comment();
    }

    public function getHome()
    {
        $products = $this->getProducts();
        $approvedComments = $this->getApprovedComments();

        $this->view->approvedComments = $approvedComments;
        $this->view->products = $products;
        $this->view->getRenderPage('home');
    }

    public function getProducts()
    {
        $sql = "SELECT * FROM product";
        $stmt = $this->connection->dbConnect()->query($sql);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    public function getApprovedComments()
    {
        $sql = "SELECT * FROM comments WHERE " . $this->comment->isApproved ."= 1";
        $stmt = $this->connection->dbConnect()->query($sql);
        $approvedComments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $approvedComments;
    }

    public function getAllComments()
    {
        $sql = "SELECT * FROM comments";
        $stmt = $this->connection->dbConnect()->query($sql);
        $allComments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $allComments;
    }

    public function addComment()
    {
        $comment = $_POST['comment'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $sql="INSERT INTO comments (commentText, name, email) VALUES ('$comment','$name', '$email')";
        $stmt=$this->connection->dbConnect()->prepare($sql);
        $stmt->execute();
    }

    public function getAdminPage()
    {
        $this->view->allComments = $this->getAllComments();
        $this->view->getRenderPage('admin');
    }
}
?>