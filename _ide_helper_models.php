<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Eloquents{
/**
 * App\Eloquents\Brewery
 *
 * @property int $id
 * @property int $shop_id
 * @property string $name
 * @property string $company_name
 * @property string $prefecture
 * @property string|null $web
 * @property string|null $twitter
 * @property string|null $facebook
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Eloquents\Shop $shop
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Brewery asc()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Brewery desc()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Brewery new()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Brewery whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Brewery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Brewery whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Brewery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Brewery whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Brewery wherePrefecture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Brewery whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Brewery whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Brewery whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Brewery whereWeb($value)
 */
	class Brewery extends \Eloquent {}
}

namespace App\Eloquents{
/**
 * App\Eloquents\Shop
 *
 * @property int $id
 * @property int $area_id
 * @property string $name
 * @property string $address
 * @property string $menu
 * @property \Carbon\Carbon $opened_at
 * @property \Carbon\Carbon $closed_at
 * @property string|null $thumbnail
 * @property string|null $web
 * @property string|null $twitter
 * @property string|null $facebook
 * @property string|null $tabelog
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Eloquents\Area $area
 * @property-read \App\Eloquents\Brewery $brewery
 * @property-read string $business_hours
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Shop asc()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Shop desc()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Shop kansai()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Shop new()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Shop refineSearch($cities, $areas)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Shop whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Shop whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Shop whereClosedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Shop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Shop whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Shop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Shop whereMenu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Shop whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Shop whereOpenedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Shop whereTabelog($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Shop whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Shop whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Shop whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Shop whereWeb($value)
 */
	class Shop extends \Eloquent {}
}

namespace App\Eloquents{
/**
 * App\Eloquents\Area
 *
 * @property int $id
 * @property int $city_id
 * @property string $name
 * @property string $color
 * @property-read \App\Eloquents\City $city
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Area asc()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Area desc()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Area new()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Area whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Area whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Area whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Area whereName($value)
 */
	class Area extends \Eloquent {}
}

namespace App\Eloquents{
/**
 * App\Eloquents\City
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Eloquents\Area[] $areas
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Eloquents\Shop[] $shops
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\City asc()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\City desc()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\City new()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\City whereName($value)
 */
	class City extends \Eloquent {}
}

