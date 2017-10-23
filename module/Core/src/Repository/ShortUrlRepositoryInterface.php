<?php
declare(strict_types=1);

namespace Shlinkio\Shlink\Core\Repository;

use Doctrine\Common\Persistence\ObjectRepository;
use Shlinkio\Shlink\Common\Repository\PaginableRepositoryInterface;
use Shlinkio\Shlink\Core\Entity\ShortUrl;

interface ShortUrlRepositoryInterface extends ObjectRepository, PaginableRepositoryInterface
{
    /**
     * @param string $shortCode
     * @return ShortUrl|null
     */
    public function findOneByShortCode(string $shortCode);
}
