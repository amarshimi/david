<?php

namespace Drupal\david_list\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Symfony\Component\HttpFoundation\Response;

/**
 * Controller for route that simply returns current time without page cache.
 */
class AllApartments extends ControllerBase
{

  /**
   * Health check.
   *
   * @return array
   *   The response.
   */
  public function list()
  {
    return [
      '#theme' => 'all_apartments',
      '#data' => $this->getAll()
    ];
  }

  private function getAll()
  {
    $query = \Drupal::entityQuery('node')
      ->condition('type', 'apartment')
      ->condition('status', 1);

    $nids = $query->execute();

    return Node::loadMultiple($nids);

  }
}
