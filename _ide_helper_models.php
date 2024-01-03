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
 * App\Models\Booking
 *
 * @property int $id
 * @property int $customer_id
 * @property int $tour_id
 * @property int $adult
 * @property int $children
 * @property string|null $special_instruction
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\BookingFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Booking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking query()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereAdult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereChildren($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereSpecialInstruction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereTourId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereUpdatedAt($value)
 */
	class Booking extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Customer
 *
 * @property int $id
 * @property string $title
 * @property string $name
 * @property string $email
 * @property string $mobile
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\CustomerFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereUpdatedAt($value)
 */
	class Customer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tour
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $image
 * @property int $price_per_pax
 * @property int $min_pax_booking
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TourItinerary> $itineraries
 * @property-read int|null $itineraries_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TourItineraryDay> $itineraryDays
 * @property-read int|null $itinerary_days_count
 * @method static \Database\Factories\TourFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Tour newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tour newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tour query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereMinPaxBooking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour wherePricePerPax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereUpdatedAt($value)
 */
	class Tour extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TourItinerary
 *
 * @property int $id
 * @property int $tour_id
 * @property int $day_id
 * @property string $begin
 * @property string|null $end
 * @property string $name
 * @property string $description
 * @property string $type
 * @property mixed|null $additional_information
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TourItineraryDay $itineraryDay
 * @property-read \App\Models\Tour $tour
 * @method static \Database\Factories\TourItineraryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|TourItinerary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TourItinerary newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TourItinerary query()
 * @method static \Illuminate\Database\Eloquent\Builder|TourItinerary whereAdditionalInformation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TourItinerary whereBegin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TourItinerary whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TourItinerary whereDayId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TourItinerary whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TourItinerary whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TourItinerary whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TourItinerary whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TourItinerary whereTourId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TourItinerary whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TourItinerary whereUpdatedAt($value)
 */
	class TourItinerary extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TourItineraryDay
 *
 * @property int $id
 * @property int $tour_id
 * @property string|null $header
 * @property int|null $position
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TourItinerary> $itineraries
 * @property-read int|null $itineraries_count
 * @property-read \App\Models\Tour|null $tour
 * @method static \Database\Factories\TourItineraryDayFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|TourItineraryDay newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TourItineraryDay newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TourItineraryDay query()
 * @method static \Illuminate\Database\Eloquent\Builder|TourItineraryDay whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TourItineraryDay whereHeader($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TourItineraryDay whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TourItineraryDay wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TourItineraryDay whereTourId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TourItineraryDay whereUpdatedAt($value)
 */
	class TourItineraryDay extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string $user_level
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserLevel($value)
 */
	class User extends \Eloquent implements \Tymon\JWTAuth\Contracts\JWTSubject {}
}

