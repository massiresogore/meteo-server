<?php

namespace App\Security;

use Lexik\Bundle\JWTAuthenticationBundle\Security\Http\Authentication\AuthenticationSuccessHandler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class CustomAuthenticationSuccessHandler extends AuthenticationSuccessHandler
{
    public function onAuthenticationSuccess(Request $request, TokenInterface $token): JsonResponse
    {
        $data = [];

        $user = $token->getUser();

        if ($user instanceof UserInterface) {
            $data['user'] = [
                'id' => $user->getId(),
                'email' => $user->getEmail(),
            ];
        }

        // Générer le JWT (ou récupérer le token généré par le JWTAuthenticator)
        $jwt = $this->jwtManager->create($user);

        // Ajouter le token à la réponse
        $data['token'] = $jwt;

        // Retourner une réponse JSON
        return new JsonResponse($data);
    }
}
