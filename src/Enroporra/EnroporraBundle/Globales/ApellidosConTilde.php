<?php

namespace Enroporra\EnroporraBundle\Globales;

class ApellidosConTilde
{

    public function convertir($cadena)
    {
        $listado = array(
            array("Tomas", "Tomás"),
            array("Tenes", "Tenés"),
            array("German", "Germán"),
            array("Rincon", "Rincón"),
            array("D'augnat", "D'Augnat"),
            array("Avila", "Ávila"),
            array("Victor", "Víctor"),
            array("Gonzalez", "González"),
            array("Fernandez", "Fernández"),
            array("Gomez", "Gómez"),
            array("Martinez", "Martínez"),
            array("Martin", "Martín"),
            array("Garcia", "García"),
            array("Vazquez", "Vázquez"),
            array("Blazquez", "Blázquez"),
            array("Lopez", "López"),
            array("Perez", "Pérez"),
            array("Sanchez", "Sánchez"),
            array("Alarcon", "Alarcón"),
            array("Peribañez", "Peribáñez"),
            array("Rios", "Ríos"),
            array("Cortes", "Cortés"),
            array("Jimenez", "Jiménez"),
            array("Gimenez", "Giménez"),
            array("Macias", "Macías"),
            array("Rocio", "Rocío"),
            array("Oscar", "Óscar"),
            array("Cesar", "César"),
            array("Monica", "Mónica"),
            array("Joaquin", "Joaquín"),
            array("Rodriguez", "Rodríguez"),
            array("Roman ", "Román "),
            array("Maria ", "María "),
            array("Ramirez", "Ramírez"),
            array("Marin", "Marín"),
            array("Marína", "Marina"),
            array("Duran", "Durán"),
            array("Galvez", "Gálvez"),
            array("Belen", "Belén"),
            array("Diaz", "Díaz"),
            array("Nuñez", "Núñez"),
            array("Veronica", "Verónica"),
            array("Menendez", "Menéndez"),
            array("Marti", "Martí"),
            array("Leon", "León"),
            array("Jose ", "José "),
            array("Marquez", "Márquez"),
            array("Bermudez", "Bermúdez"),
            array("Hernandez", "Hernández"),
            array("Lucia", "Lucía"),
            array("Gutierrez", "Gutiérrez"),
            array("Mendez", "Méndez"),
            array("Dario ", "Darío "),
            array("Ivan ", "Iván "),
            array("Ruben", "Rubén"),
            array("Alvarez", "Álvarez"),
            array("Andres", "Andrés"),
            array("Raul", "Raúl"),
            array("Beltran", "Beltrán"),
            array("Hector", "Héctor"),
            array("Guillen", "Guillén"),
            array("Gines", "Ginés"),
            array("Jesus ", "Jesús "),
            array("Minguez", "Mínguez"),
            array("Davila", "Dávila"),
            array("Fatima", "Fátima"),
            array("Pelaez", "Peláez"),
            array("Adrian ", "Adrián "),
            array("Ramon", "Ramón"),
            array("Alvaro", "Álvaro"),
            array("álvaro", "Álvaro"),
            array("Ibañez", "Ibáñez"),
            array("Roldan", "Roldán"),
            array("Suarez", "Suárez"),
            array("Angel ", "Ángel "),
            array("Garate", "Gárate"),
            array("Baez ", "Báez "),
            array("Ocon ", "Ocón "),
            array("Marañon", "Marañón"),
            array("Solis", "Solís"),
            array("Ines ", "Inés ")
        );

	$cadena=ucwords(strtr(strtolower($cadena), "ÁÉÍÓÚÑÜ", "áéíóúñü"));
	$cadena=str_replace(" De "," de ",str_replace(" Del "," del ",str_replace(" De La "," de la ",str_replace(" De Los "," de los ",str_replace(" De Las "," de las ",str_replace(" Y "," y ",str_replace(" E "," e ",$cadena)))))));
	for ($i=0; $i<strlen($cadena); $i++) {
		if ($cadena[$i]=="-"||$cadena[$i]=="'") $cadena[$i+1]=ucfirst(substr($cadena,$i+1,1));
	}
	for ($i=0; $i<count($listado); $i++) {
		$cadena=str_replace($listado[$i][0],$listado[$i][1],$cadena);
	}

	return $cadena;

    }

}
