<?php

class Material
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function getAllMaterials()
    {
        $query = "SELECT * FROM materials ORDER BY upload_date DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMaterialById($id)
    {
        $query = "SELECT * FROM materials WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createMaterial($title, $content, $voiceover)
    {
        $query = "INSERT INTO materials (title, content, voiceover) VALUES (:title, :content, :voiceover)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':voiceover', $voiceover);
        return $stmt->execute();
    }

    public function updateMaterial($id, $title, $content, $voiceover)
    {
        $query = "UPDATE materials SET title = :title, content = :content, voiceover = :voiceover, updated_at = CURRENT_TIMESTAMP WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':voiceover', $voiceover);
        return $stmt->execute();
    }

    public function deleteMaterial($id)
    {
        $query = "DELETE FROM materials WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
