<?php

/**
 * This file is part of the pantarei/oauth2-bundle package.
 *
 * (c) Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pantarei\Bundle\OAuth2Bundle\Entity;

use Doctrine\ORM\EntityRepository;
use Pantarei\OAuth2\Model\CodeInterface;
use Pantarei\OAuth2\Model\CodeManagerInterface;

/**
 * CodeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CodeRepository extends EntityRepository implements CodeManagerInterface
{
    public function getClass()
    {
        return $this->getClassName();
    }

    public function createCode()
    {
        $class = $this->getClass();
        return new $class();
    }

    public function deleteCode(CodeInterface $code)
    {
        $this->getEntityManager()->remove($code);
        $this->getEntityManager()->flush();
    }

    public function reloadCode(CodeInterface $code)
    {
        $this->getEntityManager()->refresh($code);
    }

    public function updateCode(CodeInterface $code)
    {
        $this->getEntityManager()->persist($code);
        $this->getEntityManager()->flush();
    }

    public function findCodeByCode($code)
    {
        return $this->findOneBy(array(
            'code' => $code,
        ));
    }
}
