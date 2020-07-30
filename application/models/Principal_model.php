<?php
class Principal_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function listado(){
        $this->db->select('
        archivos.id_archivos as idArchivo,
        archivos.id_usuario as id_usuario,
        archivos.nombre as nombre,
        usuario.nombre as nombreUsuario,
        categorias.nombre as categoria,
        autor.autor as nom_autor,
        editorial.editorial as nom_editorial,
        temas.temas as nom_temas,
        archivos.titulo as titulo,
        archivos.edicion as edicion,
        archivos.paginas as paginas,
        archivos.descripcion as descripcion,
        archivos.nombre as nombreArchivo,
        archivos.tipo as tipoArchivo,
        archivos.ruta as rutaArchivo,
        archivos.fecha as fechaArchivo
        FROM
            t_archivos AS archivos
                INNER JOIN
            t_usuarios AS usuario ON archivos.id_usuario = usuario.id_usuario
                INNER JOIN
            t_categorias AS categorias ON archivos.id_categoria = categorias.id_categoria
                INNER JOIN
            autor AS autor ON archivos.id_autor = autor.id_autor
                INNER JOIN
            editorial AS editorial ON archivos.id_editorial = editorial.id_editorial
                INNER JOIN
            temas AS temas ON archivos.id_temas = temas.id_temas', FALSE);

        $consulta = $this->db->get();
        return $consulta->result();
    }
    // public function nro_registros(){
    //     $consulta = $this->db->get("ventas");

    //     return $consulta->num_rows();
    // }

}