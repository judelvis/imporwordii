<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * @author Judelvis Rivas
 * @since Version 1.0
 *
 */
class Servicios extends CI_Model
{

    function __construct()
    {
        $this->load->database();
    }

    function verificar($refe){
        $resp = array("cant"=>0, "msj"=>"");
        $rs = $this->db->query("SELECT * FROM transferencia WHERE referencia ='".$refe."' limit 1");
        if($rs->num_rows() > 0){
            $fila = $rs->row();
            $newDate = date('d-m-Y g:i A', strtotime($fila->creado));
            $msj = "<h3>El numero de referencia ya se encuentra registrado</h3><br>";
            $msj .= "<table class='table table-responsive table-bordered'>
                        <thead>
                            <tr><th>Referencia</th><th>Nombre</th><th>Monto</th><th>Fecha</th><th>Creado</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>".$fila->referencia."</td><td>".$fila->nombre."</td><th>".$fila->monto."</th><th>".$fila->fecha."</th><th>".$newDate."</th></tr>    
                        </tbody>
                    </table>";
            $resp = array("cant"=>1, "msj"=>$msj);
        }
        return $resp;
    }

    function registrar($datos){
        $rs = $this->db->insert("transferencia",$datos);
        if($rs) return "Se registro con exito";
        return "Error al registrar";
    }

    function generar($data){
        $where = "WHERE ";
        $datos = array();
        if($data["hasta"] != ""){
            $where .= $data["criterio"]." between '".$data['desde']."' AND '".$data['hasta']."'";
        }else{
            $where .= $data["criterio"]." ='".$data['desde']."' ";
        }
        $rs = $this->db->query("SELECT * FROM transferencia ".$where." order by fecha asc");
        if($rs){
            $filas = $rs->result();
            $tran = array();
            $i = 0;
            foreach ($filas as $fila){
                $i++;
                $newDate = date('d-m-Y g:i A', strtotime($fila->creado));
                $btnBorrar = '<button class="btn btn-danger " onclick="borrar('.$fila->id.')" type="button"><i class="fa fa-trash-o"></i></button>';
                $tran[] = array("contador"=>$i,"refe"=>$fila->referencia,"monto"=>$fila->monto,"nombre"=>$fila->nombre,"fecha"=>$fila->fecha,
                    "cedula"=>$fila->cedula,"creado"=>$newDate,"accion"=>$btnBorrar);
            }
            $datos = array("fallo"=>0,"datos"=>$tran);
        }else{
            $datos = array("query"=>$where,"fallo"=>1,"datos"=>array());
        }
        return $datos;
    }

    function borrarTransferencia($id){
        $rs = $this->db->query("delete from transferencia where id=".$id);
        if($rs) return "Se elimino con exito";
        return "Error al eliminar";
    }

    function datosOrden($id=null){
        $rs = $this->db->query("select count(*) as cant,sum(monto)as mnt,fecha from transferencia group by fecha order by fecha desc limit 10");
        $record = $rs->result();
        $datos = array();
        foreach ($record as $row){
            $datos[] = array("x"=>$row->fecha,"y"=>$row->cant,"z"=>$row->mnt);
        }
        return array_values($datos);
    }

    function __destruct()
    {
        unset($this->Usuario);
    }

}
