CREATE SCHEMA IF NOT EXISTS pokedexFacundoRivero;
USE pokedexFacundoRivero;
CREATE TABLE pokemones ( id int(11) NOT NULL AUTO_INCREMENT,
                         imagen VARCHAR(255) DEFAULT NULL,
                         nombre VARCHAR(255) NOT NULL,
                         tipo VARCHAR(255) NOT NULL,
                         descripcion VARCHAR(800) NOT NULL,
                         PRIMARY KEY ('id')
)ENGINE=INNODB AUTO_INCREMENT=13 DEFAULT CHARSET= utf8mb4;

INSERT INTO pokemones (imagen, nombre, tipo, descripcion)
VALUES(Bulbasaur-hierba.png, Bulbasaur, hierba,Bulbasaur es un Pokémon de tipo planta/veneno introducido en la primera generación. Es uno de los Pokémon iniciales que pueden elegir los entrenadores que empiezan su aventura en la región Kanto, junto a Squirtle y Charmander (excepto en Pokémon Amarillo). Destaca por ser el primer Pokémon de la Pokédex Nacional.),
      (Charmander-fuego.png, Charmander, fuego, Charmander es un Pokémon de tipo fuego introducido en la primera generación. Es uno de los Pokémon iniciales que pueden elegir los entrenadores que empiezan su aventura en la región Kanto, junto a Bulbasaur y Squirtle, excepto en Pokémon Amarillo y Pokémon: Let's Go, Pikachu! y Pokémon: Let's Go, Eevee!),
      (Bellsprout-hierba.png, Bellsprout, hierba, Bellsprout es un Pokémon de tipo planta/veneno introducido en la primera generación. Es la contraparte de Oddish.),
      (Flareon-fuego.png, Flareon, fuego, Flareon es un Pokémon de tipo fuego introducido en la primera generación. Es una de las ocho posibles evoluciones de Eevee.),
      (Psyduck-agua.png, Psyduck, agua, Psyduck es un Pokémon de tipo agua introducido en la primera generación.),
      (Victreebel-hierba.png, Victreebel, hierba,Victreebel es un Pokémon de tipo planta/veneno introducido en la primera generación. Es la evolución de Weepinbell y la contraparte de Vileplume. ),
      (Squirtle-agua.png, Squirtle, agua, Squirtle es un Pokémon de tipo agua introducido en la primera generación. Es uno de los Pokémon iniciales que pueden elegir los entrenadores que empiezan su aventura en la región Kanto, junto a Bulbasaur y Charmander, excepto en Pokémon Amarillo.),
      (Wartortle-agua.png, Wartortle, agua, Wartortle es un Pokémon de tipo agua introducido en la primera generación Es la forma evolucionada de Squirtle, uno de los Pokémon iniciales de Kanto.),
      (Vulpix-fuego.png, Vulpix, fuego, Vulpix es un Pokémon de tipo fuego introducido en la primera generación. Es la forma habitual del Vulpix de Alola. Es la contraparte de Growlithe.),
      (Shellder-agua.png, Shellder, agua, Shellder es un Pokémon de tipo agua introducido en la primera generación.);

