<?php
 include 'mainService.php';

  class ModuleService extends MainService{

    private $entity = "seg_rol";

    function insert($codigo, $nombre, $estado, $rol) {
        $stmt = $this->conex->prepare("INSERT INTO seg_modulo (COD_MODULO, NOMBRE, ESTADO) VALUES (?,?,?)");
        $stmt->bind_param('sss', $codigo, $nombre, $estado);
        $stmt = $this->conex->prepare("INSERT INTO rol_modulo (COD_ROL, COD_MODULO) VALUES (?,?)");
        $stmt->bind_param('ss', $codigo, $rol);
        $stmt->execute();
        $stmt->close();
    }

    function findAll() {
        return $this->findAll1($this->entity);
    }

    function findByPK($codeTest) {
        $result = $this->conex->query("SELECT * FROM seg_modulo WHERE COD_MODULO=".$codeTest);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    function update($nombre, $estado, $codigo) {
        $stmt = $this->conex->prepare("UPDATE seg_modulo set NOMBRE = ?,  ESTADO = ? WHERE COD_MODULO = ?");
        $stmt->bind_param('sss', $nombre, $estado, $codigo);
        $stmt->execute();
        $stmt->close();
    }

    function delete($codigo) {
        $stmt = $this->conex->prepare("DELETE FROM  seg_modulo  WHERE COD_MODULO = ?");
        $stmt->bind_param('s', $codigo);
        $stmt->execute();
        $stmt->close();
    }
}

?>