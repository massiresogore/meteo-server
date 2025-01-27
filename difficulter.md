# Difficuleter rencontrer
---

- **Cette commande a généré des erreurs lors des migrations avec Docker :**  
```bash
php bin/console doctrine:migrations:diff
```  
Pour résoudre ce problème, j'ai utilisé la commande suivante, en remplaçant `php` par `symfony` :  
```bash
symfony console doctrine:migrations:diff
```

- **Entête requise pour les tests de l'API :**  
Il était nécessaire de modifier l'en-tête de la requête pour garantir son bon fonctionnement.

  - **Pour les modifications :**  
    ```
    Accept: application/ld+json  
    Content-Type: application/merge-patch+json
    ```

  - **Pour les autres cas :**  
    ```
    Accept: application/ld+json  
    Content-Type: application/ld+json
    ```

- **Configuration de JWT et enregistrement :**  
