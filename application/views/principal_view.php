<?php 

    echo "<article>";
        foreach ($reporte as $reg):
			echo "<div class='card'>";
			echo '<div class="card-body">';
			echo '<h2 class="card-title">'.$reg->titulo.'</h2>';
			echo '<p class="card-text">'.$reg->descripcion.'</p>';
			echo '<h4 class="card-subtitle mb-2 text-muted">Autor: '.$reg->nom_autor.' <br/> Editorial: '.$reg->nom_editorial.' </h4>';
			echo '<a href="'.base_url().'admin/archivos/'.$reg->id_usuario.'/'.$reg->nombre.'" class="card-link">Ver PDF</a>';
			echo "</div></div>";
        endforeach;
	echo "</article>";

?>
