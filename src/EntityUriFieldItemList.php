<?php

namespace Drupal\patterns_lib;

use Drupal\Core\Field\FieldItemList;

class EntityUriFieldItemList extends FieldItemList {

  protected $isPopulated = false;

  /**
   * {@inheritdoc}
   */
  public function getIterator() {
    $this->ensurePopulated();
    return parent::getIterator();
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $this->ensurePopulated();
    return parent::isEmpty();
  }


  /**
   * Populate computed field.
   */
  function ensurePopulated() {
    if ($this->isPopulated) {
      return;
    }
    $entity = $this->getEntity();
    $this->list[] = $this->createItem(0,[ 
      'value' => 'internal:' . $entity->toUrl()->toString()
    ]);
    $this->isPopulated = TRUE;
  }
}