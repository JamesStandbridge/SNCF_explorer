# SNCF_explorer Symfony 4.4 - React|Redux Application

## Prérequis

- `docker`
- `docker-compose`

## Documentation

- [Configuration Linux && Docker](https://github.com/JamesStandbridge/SNCF_explorer/blob/main/documentations/installation-config-ubuntu.md)
- [Configuration de Git](https://github.com/JamesStandbridge/SNCF_explorer/blob/main/documentations/installation-config-git.md)

## Quickstart

```shell
# Fetch project
git clone git@github.com:JamesStandbridge/SNCF_explorer.git SNCF_explorer
cd SNCF_explorer

# Build and launch project
docker-compose up -d
```
Au premier lancement de l'application, utilisez :
```shell
# development version
docker exec -it --env ENV=DEV SNCF_explorer_application_1 /var/www/project/docker/install.sh

# production version
docker exec -it SNCF_explorer_application_1 /var/www/project/docker/install.sh
```

Ou via une installation manuelle : 

```shell

# ouvrir une commande bash a l'interieur du container applicatif : 
docker exec -it SNCF_explorer_application_1 bash 

# puis executez ces commandes

# build JWT configuration
mkdir -p config/jwt
openssl genpkey -out config/jwt/private.pem -aes256 -algorithm rsa -pkeyopt rsa_keygen_bits:4096 -pass pass:$password
openssl pkey -in config/jwt/private.pem -out config/jwt/public.pem -pubout -passin pass:$password
chown -R 1000:1000 config/jwt
chmod +r config/jwt/private.pem 

# build database
php bin/console doctrine:database:create
php bin/console doctrine:schema:create

# build assets
yarn encore dev
```

Pour charger les fixtures, utiliser ces fixtures :
```shell 
docker-compose exec php bin/console hautelook:fixtures:load

# ou depuis le container applicatif :
php bin/console hautelook:fixtures:load
```

## Accès application

### Connexion vers l'application via le container (accès shell)

```shell
docker exec -it SNCF_explorer_application_1 /bin/bash
```

### Connexion vers l'application via l'host

Go to http://localhost:8002.

## Accès base de données

### Connexion vers la BDD postgresql de l'application via le container

```shell
docker exec -it SNCF_explorer_database_1 psql -U postgres
```

### Connexion vers la BDD postgresql de l'application via l'host

Le `port`, `password` de la base de données `postgresql` peuvent être trouvés dans le fichier `docker-compose.yaml` a la racine du projet.
Par défaut, `postgresql` utilise l'utilisateur `postgres`.

Par défaut, le mot de passe est `root` et le port `5432`.

#### Récuperer l'IP du container sur l'host

```shell
docker inspect -f '{{range.NetworkSettings.Networks}}{{.IPAddress}}{{end}}' SNCF_explorer_database_1
```

Vous pouvez ensuite acceder a la BDD via le client postgresql avec :

```
host    : {container IP}
port    : {docker-compose.yaml port}
login   : postgres
password: {docker-compose.yaml POSTGRES_PASSWORD}
```

#### Exemple en utilisant `psql` sur l'host

```shell
psql -h {container IP} -U postgres -W
```

#### Utilisant PGadmin (équivalent PHPMyAdmin, mais pour postgresql)

L'application `docker-compose.yaml` fournis un container `pgadmin` tournant sur le port `8003`.

http://127.0.0.1:8003 avec les identifiants :
* username: `root@root.com`
* password: `root`

Ces informations proviennent du fichier `docker-compose.yaml`.

## Stopper Docker

```shell
docker-compose down
```

Pour les utilisateurs de docker sur VM, ll est important de ne pas laisser tourner les containers trop longtemps (plusieurs jours) et encore moins lorsque votre machine est en veille. En effet, cela peut parfois desynchroniser l'horloge interne du container applicatif avec l'horloge de votre pc et tout est cassé ensuite (suffit cependant de rebuild les containers pour régler le soucis :))
