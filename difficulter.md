# Difficuleter rencontrer
- cette commande ma gégérer des erreurs pour les migration avec docker
```bash
php bin/console doctrine:migrations:diff
```
j'ai utilisé bien apres symfony au à la place de php pour que ça fonctionne
```bash
symfony console doctrine:migrations:diff
```

- En tete pour le test de l'api
il fallait lodifier l'entete

- pour les modification
Accept : application/ld+json
Content-Type: application/merge-patch+json

- le reste
Accept : application/ld+json
Content-Type: application/ld+json

- Configuration Jwt, Register