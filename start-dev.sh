# Renvoie l'ID utilisateur (UID) de l'utilisateur courant.
export DOCKER_UID=$(id -u)

# Renvoie l'ID groupe (GID) de l'utilisateur courant.
export DOCKER_GID=$(id -g)

# Arrête tous les conteneurs Docker en cours d'exécution.
docker stop $(docker ps -aq)

# Démarre les services définis dans le fichier docker-compose.yml en arrière-plan.
docker-compose up -d