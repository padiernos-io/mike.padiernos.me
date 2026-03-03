<?php

use Drupal\Core\Field\FieldStorageDefinitionInterface;

/**
 * Provides a custom storage schema class for trash-enabled entity types.
 */
class Drupal__path_alias__PathAliasStorageSchemaTrash69a6377bc7a26 extends \Drupal\path_alias\PathAliasStorageSchema {

  /**
   * {@inheritdoc}
   */
  protected function getSharedTableFieldSchema(FieldStorageDefinitionInterface $storage_definition, $table_name, array $column_mapping): array {
    $schema = parent::getSharedTableFieldSchema($storage_definition, $table_name, $column_mapping);

    // @todo Add the 'deleted' field to the required indexes.

    return $schema;
  }

}
