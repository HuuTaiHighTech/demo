<?php
require_once(__DIR__ . "/../config/db.class.php");


class Category
{
    public $cateId; // Archive the ID of the category
    public $cateName;// Category name archive variable.
    public $cateDes;// Category description archive variable.
    // Hthe initialization function for the Category class, setting the name and description.
    public function __construct(
        $cate_name,
        $cate_des,
    ) {
        $this->cateName = $cate_name;
        $this->cateDes = $cate_des;
    }

    // SAVE CATEGORY
    public function save()
    {
        $db = new Db();

        $sql = "INSERT INTO category (CategoryName,Description) VALUES ('$this->cateName','$this->cateDes')";
        // query_execute is a function from class Db
        $result = $db->query_execute($sql);
        // Return results
        return $result;
    }

    // List of products
    public static function list_category()
    {
        $db = new DB();
        $sql = "SELECT * FROM category";
        // select_to_array is a function of class Db, used to output an array
        $rs = $db->select_to_array($sql);
        return $rs;
    }
}