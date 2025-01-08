<?php

require_once 'Material.php';

class MaterialController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new Material($db);
    }

    public function index()
    {
        $materials = $this->model->getAllMaterials();
        require 'views/materials/index.php';
    }

    public function show($id)
    {
        $material = $this->model->getMaterialById($id);
        require 'views/materials/show.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $voiceover = $_FILES['voiceover']['name'];

            // Upload file
            if ($voiceover) {
                $targetDir = "uploads/";
                move_uploaded_file($_FILES['voiceover']['tmp_name'], $targetDir . $voiceover);
            }

            $this->model->createMaterial($title, $content, $voiceover);
            header("Location: /materials");
        } else {
            require 'views/materials/create.php';
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $voiceover = $_FILES['voiceover']['name'];

            // Upload file
            if ($voiceover) {
                $targetDir = "uploads/";
                move_uploaded_file($_FILES['voiceover']['tmp_name'], $targetDir . $voiceover);
            }

            $this->model->updateMaterial($id, $title, $content, $voiceover);
            header("Location: /materials");
        } else {
            $material = $this->model->getMaterialById($id);
            require 'views/materials/edit.php';
        }
    }

    public function delete($id)
    {
        $this->model->deleteMaterial($id);
        header("Location: /materials");
    }
}
