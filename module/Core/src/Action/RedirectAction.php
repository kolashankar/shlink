<?php

declare(strict_types=1);

namespace Shlinkio\Shlink\Core\Action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface;
use Shlinkio\Shlink\Core\ShortUrl\Entity\ShortUrl;
use Shlinkio\Shlink\Core\ShortUrl\Helper\ShortUrlRedirectionBuilderInterface;
use Shlinkio\Shlink\Core\ShortUrl\ShortUrlResolverInterface;
use Shlinkio\Shlink\Core\Util\RedirectResponseHelperInterface;
use Shlinkio\Shlink\Core\Visit\RequestTrackerInterface;

class RedirectAction extends AbstractTrackingAction
{
    public function __construct(
        ShortUrlResolverInterface $urlResolver,
        RequestTrackerInterface $requestTracker,
        private readonly ShortUrlRedirectionBuilderInterface $redirectionBuilder,
        private readonly RedirectResponseHelperInterface $redirectResponseHelper,
    ) {
        parent::__construct($urlResolver, $requestTracker);
    }

    protected function createSuccessResp(ShortUrl $shortUrl, ServerRequestInterface $request): Response
    {
        $longUrl = $this->redirectionBuilder->buildShortUrlRedirect($shortUrl, $request);
        return $this->redirectResponseHelper->buildRedirectResponse($longUrl);
    }
}
