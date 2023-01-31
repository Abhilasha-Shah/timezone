<?php

namespace Drupal\datetimeastimezone\Service;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\datetimeastimezone\DateTimeasTimezoneInterface;

/**
 * Service description.
 */
class DateTimeasTimezoneService implements DateTimeasTimezoneInterface {

  /**
   * The config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * Creates a new DateTimeasTimezoneService instance.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The config factory.
   */
  public function __construct(ConfigFactoryInterface $config_factory) {
    $this->configFactory = $config_factory;
  }

  /**
   * {@inheritdoc}
   */
  public function getCountry() {
    return $this->configFactory->get('datetimeastimezone.settings')->get('country');
  }

  /**
   * {@inheritdoc}
   */
  public function getCity() {
    return $this->configFactory->get('datetimeastimezone.settings')->get('city');
  }

  /**
   * {@inheritdoc}
   */
  public function getTimezone() {
    return $this->configFactory->get('datetimeastimezone.settings')->get('timezone') ?: date_default_timezone_get();
  }

  /**
   * {@inheritdoc}
   */
  public function getDateTime() {
    $timezone = new \DateTimeZone($this->getTimezone());
    $date = new DrupalDateTime('now', $timezone);
    return $date->format('jS M Y - g:i A');
  }

}
