<?php

namespace Drupal\datetimeastimezone;

/**
 * Update the datetime as selected timezone.
 *
 * @see \Drupal\datetimeastimezone\DateTimeasTimezoneInterface
 */
interface DateTimeasTimezoneInterface {

  /**
   * Get the Country
   *
   * @return string
   *   The selected Country
   */
  public function getCountry();

  /**
   * Get the City
   *
   * @return string
   *   The selected City
   */
  public function getCity();

  /**
   * Get the Timezone
   *
   * @return string
   *   The selected Timezone
   */
  public function getTimezone();

  /**
   * Get the DateTime
   *
   * @return string
   *   The selected DateTime
   */
  public function getDateTime();

}
