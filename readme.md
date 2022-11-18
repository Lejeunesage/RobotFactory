10. Projet - Robot Factory

Usine de robots

Qui n'a jamais rêvé de se fabriquer un robot pour exterminer l'humanité faire le café ?

Dans un fichier index.php, qui contiendra tout en haut votre logique PHP, puis le document HTML à proprement parler, vous allez développer un programme capable de créer un nouveau robot à chaque rafraîchissement de la page. Le robot saluera alors l'utilisateur et se présentera. Exemple :

« Salut, humain. Je suis VX-2345. »

Le nom du robot est généré aléatoirement au chargement de la page. Il se constituera toujours de deux lettres majuscules, d'un tiret et de quatre nombres.
Bonus 1

Après s'être présenté, le robot annoncera la date et l'heure actuelles au format suivant :

« Nous sommes le 30 07 2020, il est 11:59:30. »
Bonus 2

Après avoir annoncé la date et l'heure, le robot choisira un nombre aléatoire compris entre 1 et 10, et vous dira si c'est un nombre pair ou impair. Exemple :

« J'ai choisi le nombre 3. C'est un nombre impair. »
Bonus 3

Notre robot découvre le sens de l'humour. Il lui prendra alors l'idée de dire son nom à l'envers. Un robot du nom de VX-2345 dira alors :

« Mon nom à l'envers s'écrit 5432-XV. Ah. Ah. Ah. »
Bonus 4

Oups ! Il s'avère que notre robot a une chance sur trois de devenir un robot tueur diabolique.

Deux fois sur trois, le robot dira « Vous voulez un café ? »

Une fois sur trois, le robot dira « Extermination ! Extermination ! »
Bonus 5

Pour nous assurer que notre robot ne tente pas de détruire notre civilisation, il va falloir l'occuper.

En développant une conscience, il a aussi développé un subconscient. Nous allons injecter le programme suivant dans son cerveau :

    Le subconscient du robot génère un nombre aléatoire compris entre 1 et 1000. Stockez ce nombre dans une variable.
    Le robot ne peut pas s'empêcher de chercher à deviner ce nombre. La conscience n'a pas directement accès au subconscient. En d'autres termes, le robot ne peut pas utiliser la variable précédemment déclarée pour trouver ce nombre, il va devoir faire preuve de logique et la trouver par lui-même.
    Une fois le nombre trouvé, il le criera fièrement.

Bonus 6

Il y a fort à parier que vous avez utilisé une boucle dans le bonus précédent afin de trouver le nombre. Pour ce besoin, une boucle n'est pas très efficace. Mettez en place une recherche dichotomique. (:




************************************************************************************************


03. Projet - Robot Factory 2

Robots sur mesure

Notre usine de robots est très fonctionnelle. Elle présente toutefois un problème majeur : nous n'avons aucun contrôle sur la construction des robots. Leurs noms sont générés aléatoirement, par exemple.

Quand l'utilisateur arrive sur la page, il verra désormais un formulaire de réglage de robot. Ce formulaire demandera à l'utilisateur de saisir un nom pour son robot. Puis lorsque l'utilisateur valide le formulaire, la page se recharge et le robot est créé avec le nom ainsi entré.

Notez que ce champ n'est pas requis. Si l'utilisateur valide le formulaire sans saisir de nom, alors celui-ci sera toujours généré aléatoirement.

Pour le reste, le robot effectue toujours les actions du précédent cours : dire son nom, choisir un nombre, dire son nom à l'envers, etc.

Oh ! Et bien sûr, cette fois on divise les fichiers ! Nous pourrions imaginer le découpage suivant :

    Un fichier robot_functions.php dédié aux fonctions propres au robot
    Un fichier generic_functions.php dédié aux fonctions génériques
    Un fichier homepage.phtml dédié au template HTML à proprement parler. L'extension phtml sera utilisée par convention pour les fichiers contenant essentiellement du HTML mais aussi un peu de PHP.
    Un fichier index.php, point d'entrée du programme, servant de jonction entre tous les autres fichiers

Simple ! C'est parti.
Indices

    Vous aurez besoin de rendre votre HTML dynamique : vous affichez le formulaire si et seulement s'il n'a pas déjà été soumis, sinon vous affichez le robot nouvellement créé. Jetez un œil à la syntaxe alternative des structures de contrôle
    N'oubliez pas la fonction isset. Vous pourriez aussi avoir besoin de la fonction empty.

Bonus 1

Mon robot est-il un diabolique monstre tueur de métal, ou un sympathique esclave servile ? L'utilisateur a désormais la possibilité de ne plus se fier au destin pour ce choix qui pourrait bien déterminer l'avenir de l'humanité.

Un champ de formulaire permet à l'utilisateur de spécifier la moralité de son robot. S'il le souhaite, il a toujours la possibilité de s'en remettre au hasard.
Bonus 2

Si notre robot est diabolique, la dernière phrase s'affiche en rouge et en gras.
Bonus 3

Si l'utilisateur saisit un nom de robot, obligez-le à respecter le format « XX-9999 », c'est-à-dire deux lettres, un tiret et quatre chiffres. Si le nom saisi ne correspond pas au format demandé, empêchez la création du robot.

    Ce bonus est d'un niveau un peu avancé, même pour les bons élèves. Ce n'est pas grave si vous préférez plutôt améliorer librement votre robot, ou aider vos camardes. Si vous tenez malgré tout à accomplir ce bonus 3, n'hésitez pas à demander de l'aide à vos formateurs.
