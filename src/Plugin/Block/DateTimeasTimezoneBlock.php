<?php

namespace Drupal\datetimeastimezone\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\datetimeastimezone\DateTimeasTimezoneInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides an DateTimeasTimezone block.
 *
 * @Block(
 *   id = "datetimeastimezone",
 *   admin_label = @Translation("DateTimeasTimezone"),
 *   category = @Translation("DateTimeasTimeZone")
 * )
 */
class DateTimeasTimezoneBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * The datetime provider.
   *
   * @var \Drupal\datetimeastimezone\DateTimeasTimezoneInterface
   */
  protected $datetimeService;

  /**
   * Constructs a new DateTimeasTimezoneBlock.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin ID for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\datetimeastimezone\DateTimeasTimezoneInterface $datetime_service
   *   The datetime_service.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, DateTimeasTimezoneInterface $datetime_service) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);

    $this->datetimeService = $datetime_service;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('datetimeastimezone'),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $datetime = $this->datetimeService->getDateTime();
    $country = $this->datetimeService->getCountry();
    $city = $this->datetimeService->getCity();
    $timezone = $this->datetimeService->getTimezone();
    return [
      '#theme' => 'datetime_as_timezone',
      '#datetime' => $datetime,
      '#country' => $country,
      '#city' => $city,
      '#timezone' => $timezone,
      '#cache' => [
               'max-age' => 0,
               'tags' => [
                  'config:datetimeastimezone.settings',
                ],
               
      ],
    ];
  }

}
