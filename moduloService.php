<?php
 include 'mainService.php';

  class ModuleService extends MainService{

    private $entityName = "seg_modulo";
    private $entity = "seg_rol";

    function insert($codigo, $nombre, $estado) {
        $stmt = $this->conex->prepare("INSERT INTO seg_modulo (COD_MODULO, NOMBRE, ESTADO) VALUES (?,?,?)");
        $stmt->bind_param('sss', $codigo, $nombre, $estado);
        $stmt->execute();
        $stmt->close();
    }

    function findAll() {
        return $this->findAll1($this->entity);
    }

    function findByPK($codeTest) {
        $result = $this->conex->query("SELECT * FROM seg_modulo WHERE cod_modulo=".$codeTest);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    function update($nombre, $codeTest) {
        $stmt = $this->conex->prepare("UPDATE seg_modulo set nombre = ?,  estado = ? WHERE cod_modulo = ?");
        $stmt->bind_param('ss', $nombre, $fechaNacimiento, $codeTest);
        $stmt->execute();
        $stmt->close();
    }

    function delete($codTest) {
        $stmt = $this->conex->prepare("DELETE FROM  seg_modulo  WHERE cod_modulo = ?");
        $stmt->bind_param('s', $codeTest);
        $stmt->execute();
        $stmt->close();
    }
}

?>