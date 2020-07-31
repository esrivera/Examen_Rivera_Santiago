<?php
 include 'mainService.php';

  class FuncionalidadService extends MainService{

    private $entity = "seg_modulo";

    function insert($nombre, $url, $descripcion, $codigo) {
        $stmt = $this->conex->prepare("INSERT INTO seg_funcionalidad (COD_MODULO, URL_PRINCIPAL, NOMBRE, DESCRIPCION) VALUES (?,?,?,?)");
        $stmt->bind_param('ssss', $codigo, $url, $nombre, $descripcion);
        $stmt->execute();
        $stmt->close();
    }

    function findAll() {
        return $this->findAll1($this->entity);
    }

    function findByPK($codeTest) {
        $result = $this->conex->query("SELECT * FROM seg_funcionalidad WHERE COD_FUNCIONALIDAD=".$codeTest);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    function update($nombre, $url, $descripcion, $codigo, $cod) {
        $stmt = $this->conex->prepare("UPDATE seg_funcionalidad set COD_MODULO = ?, URL_PRINCIPAL=?, NOMBRE=?, DESCRIPCION=? WHERE COD_FUNCIONALIDAD = ?");
        $stmt->bind_param('ssssi', $codigo, $url, $nombre, $descripcion, $cod);
        $stmt->execute();
        $stmt->close();
    }

    function delete($codeTest) {
        $stmt = $this->conex->prepare("DELETE FROM  seg_funcionalidad  WHERE COD_FUNCIONALIDAD = ?");
        $stmt->bind_param('S', $codeTest);
        $stmt->execute();
        $stmt->close();
    }
}

?>