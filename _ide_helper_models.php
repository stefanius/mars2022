<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Address
 *
 * @property int $id
 * @property string $name
 * @property string|null $email
 * @property string $street_address
 * @property string $postal_code
 * @property string $city
 * @property int $send_poster
 * @property int $send_email
 * @property int|null $address_type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\AddressType|null $addressType
 * @property-read string $type
 * @method static \Database\Factories\AddressFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereAddressTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereSendEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereSendPoster($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereStreetAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUpdatedAt($value)
 */
	class Address extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AddressType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Address[] $addresses
 * @property-read int|null $addresses_count
 * @method static \Illuminate\Database\Eloquent\Builder|AddressType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressType query()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AddressType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AddressType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AddressType whereUpdatedAt($value)
 */
	class AddressType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Day
 *
 * @property int $id
 * @property string $name
 * @property int $show_on_pre_order
 * @method static \Illuminate\Database\Eloquent\Builder|Day newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Day newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Day query()
 * @method static \Illuminate\Database\Eloquent\Builder|Day whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Day whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Day whereShowOnPreOrder($value)
 */
	class Day extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Distance
 *
 * @property int $id
 * @property string $name
 * @property int $long_distance
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Distance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Distance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Distance query()
 * @method static \Illuminate\Database\Eloquent\Builder|Distance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Distance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Distance whereLongDistance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Distance whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Distance whereUpdatedAt($value)
 */
	class Distance extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\InventoryItem
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $obtained_at
 * @property string|null $obsolete_at
 * @property int $amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\InventoryItemFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryItem whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryItem whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryItem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryItem whereObsoleteAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryItem whereObtainedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryItem whereUpdatedAt($value)
 */
	class InventoryItem extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Order
 *
 * @property int $id
 * @property string|null $order_number
 * @property string|null $barcode_image
 * @property string|null $mollie_payment_id
 * @property string|null $mollie_payment_status
 * @property string|null $hash
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $email
 * @property string|null $organisation
 * @property string|null $phone
 * @property int $mail_consent
 * @property int $agreed_terms_of_service
 * @property string|null $locale
 * @property \Illuminate\Support\Carbon|null $paid_at
 * @property \Illuminate\Support\Carbon|null $started_at
 * @property \Illuminate\Support\Carbon|null $printed_at
 * @property \Illuminate\Support\Carbon|null $finished_at
 * @property int $distance_id
 * @property int $day_id
 * @property int $season_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Day $day
 * @property-read \App\Models\Distance $distance
 * @property-read mixed $grand_total
 * @property-read string $grand_total_currency
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderLine[] $orderLines
 * @property-read int|null $order_lines_count
 * @property-read \App\Models\Season $season
 * @method static \Illuminate\Database\Eloquent\Builder|Order activeSeason()
 * @method static \Database\Factories\OrderFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Order finished()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order notFinished()
 * @method static \Illuminate\Database\Eloquent\Builder|Order notPrinted()
 * @method static \Illuminate\Database\Eloquent\Builder|Order notStarted()
 * @method static \Illuminate\Database\Eloquent\Builder|Order onlyGroups()
 * @method static \Illuminate\Database\Eloquent\Builder|Order paid()
 * @method static \Illuminate\Database\Eloquent\Builder|Order preOrder()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order started()
 * @method static \Illuminate\Database\Eloquent\Builder|Order unpaid()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAgreedTermsOfService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBarcodeImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDayId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDistanceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereFinishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereMailConsent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereMolliePaymentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereMolliePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrderNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrganisation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaidAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePrintedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSeasonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStartedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 */
	class Order extends \Eloquent implements \Illuminate\Contracts\Translation\HasLocalePreference {}
}

namespace App\Models{
/**
 * App\Models\OrderLine
 *
 * @property int $id
 * @property int $order_id
 * @property int $ticket_type_id
 * @property int $half_price
 * @property int $quantity
 * @property float $amount
 * @property float $total_amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TicketType $ticket
 * @method static \Database\Factories\OrderLineFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLine query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLine whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLine whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLine whereHalfPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLine whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLine whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLine whereTicketTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLine whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLine whereUpdatedAt($value)
 */
	class OrderLine extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Season
 *
 * @property int $id
 * @property int $edition
 * @property int $minimum_group
 * @property \Illuminate\Support\Carbon $pre_order_starts_at
 * @property \Illuminate\Support\Carbon $pre_order_ends_at
 * @property \Illuminate\Support\Carbon $saturday_date
 * @property \Illuminate\Support\Carbon $sunday_date
 * @property int $year
 * @property string|null $read_only_since
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\SeasonFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Season newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Season newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Season query()
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereEdition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereMinimumGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season wherePreOrderEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season wherePreOrderStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereReadOnlySince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereSaturdayDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereSundayDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereYear($value)
 */
	class Season extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TicketType
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $order
 * @property int $amount_pre_order
 * @property int $amount_order
 * @property int $allow_pre_order
 * @property int $allow_order
 * @property int $with_medal
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TicketType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketType query()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketType whereAllowOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketType whereAllowPreOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketType whereAmountOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketType whereAmountPreOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketType whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketType whereWithMedal($value)
 */
	class TicketType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string $locale
 * @property int $admin
 * @property \Illuminate\Support\Carbon|null $login_window_starts_at
 * @property \Illuminate\Support\Carbon|null $login_window_ends_at
 * @property \Illuminate\Support\Carbon|null $suspended_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLoginWindowEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLoginWindowStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSuspendedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Translation\HasLocalePreference {}
}

