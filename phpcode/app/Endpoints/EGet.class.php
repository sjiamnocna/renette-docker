<?php
declare(strict_types=1);

namespace APIcation\Endpoints;

use Nette\Application\Responses\JsonResponse;
use Nette\Database\Connection;

/**
 * Handle user login/logout, keep login state, keepalive session etc.
 */
class EGet extends CAbstractEndpoint
{
    protected array $post;

    public function __construct(
      Connection $Con
    ){
        $this->Con = $Con;
    }

    /**
     * Get list of applications given by parameters
     *
     * @return JsonResponse
     */
    public function __list(): JsonResponse
    {
        return new JsonResponse($this->getArray($this->post[ 'params' ]));
    }

    public function one(): JsonResponse
    {
        return new JsonResponse([
          'data' => 42
        ]);
    }
}