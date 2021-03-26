<?php
namespace App\Security;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

/**
 * Grants acces based on the password and username passed in the query StringQueryVoter
 * aka ?username=&password=
 * right now only gsb gsb is allowed
 * only grants ROLE_API
 */
class StringQueryVoter extends Voter {
    
    protected function supports(string $attribute, $subject) {
        //only grants ROLE_API
        if (!in_array($attribute, [self::ROLE_API])) {
            return false;
        }
        // Can only vote on Requests
        if(!$subject instanceof Request) {
            return false;
        }
        return true;
    }
    const GSB = "gsb";
    const ROLE_API = "ROLE_API";
    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token){
        
        $username = $subject->query->get("username");
        $password = $subject->query->get("password");
        
        //checks for gsb gsb
        return ! (strcmp(self::GSB,$username) || strcmp(self::GSB,$password));
    }
}
