<?php
 include 'mainService.php';

  class Test extends MainService{

    private $entityName = "seg_rol";

    function insert($nombre) {
        $stmt = $this->conex->prepare("INSERT INTO test (name) VALUES (?)");
        $stmt->bind_param('s', $nombre);
        $stmt->execute();
        $stmt->close();
    }

    function findAll() {
        return $this->findAll1($this->entityName);
    }

    function findByPK($codeTest) {
        $result = $this->conex->query("SELECT * FROM test WHERE code=".$codeTest);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    function update($nombre, $codeTest) {
        $stmt = $this->conex->prepare("UPDATE test set name = ? WHERE code = ?");
        $stmt->bind_param('si', $nombre, $fechaNacimiento, $codeTest);
        $stmt->execute();
        $stmt->close();
    }

    function delete($codTest) {
        $stmt = $this->conex->prepare("DELETE FROM  test  WHERE code = ?");
        $stmt->bind_param('i', $codeTest);
        $stmt->execute();
        $stmt->close();
    }
}

?>