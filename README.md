# Laravel SEO Schema.org

Laravel SEO Schema.org package.

## Requirements

* PHP 7.2+
* Laravel 5.6+

## Installation

Install the package by running this command in your terminal/cmd:
```
composer require noud/laravel-seo-schema-org
```

## Usage in models

Now you can extend your models from Schema.org

```
<?php

namespace App\Models;

use SEO\SchemaOrg\Models\BlogPosting as SchemaOrgBlogPosting;

class BlogPosting extends SchemaOrgBlogPosting
{}
```

### [Schema.org](https://schema.org) [Types](https://schema.org/docs/full.html)

- [Thing](https://schema.org/Thing)
    - Action
        - [SearchAction](https://schema.org/SearchAction)
    - [CreativeWork](https://schema.org/CreativeWork)
        - [Article](https://schema.org/Article)
            - SocialMediaPosting
                - [BlogPosting](https://schema.org/BlogPosting)
        - [WebSite](https://schema.org/WebSite)
    - [Organization](https://schema.org/Organization)
        - [LocalBusiness](https://schema.org/LocalBusiness)
    - [Person](https://schema.org/Person)
    - [Place](https://schema.org/Place)
        - [LocalBusiness](https://schema.org/LocalBusiness)
    - Intangible
        - [ItemList](http://schema.org/ItemList)
            - [BreadcrumbList](https://schema.org/BreadcrumbList)
        - [JobPosting](https://schema.org/JobPosting)
        - [ListItem](http://schema.org/ListItem)
        - [PropertyValueSpecification](https://schema.org/PropertyValueSpecification)
        - [Role](https://schema.org/Role)
        - StructuredValue
            - [ContactPoint](https://schema.org/ContactPoint)
                - [PostalAddress](https://schema.org/PostalAddress)
            - [GeoCoordinates](https://schema.org/GeoCoordinates)
            - [MonetaryAmount](https://schema.org/MonetaryAmount)
            - [OpeningHoursSpecification](https://schema.org/OpeningHoursSpecification)
            - [PropertyValue](https://schema.org/PropertyValue)
            - [QuantitativeValue](https://schema.org/QuantitativeValue)

## [Entity-Relationship Diagram](https://en.wikipedia.org/wiki/Entity–relationship_model)

![Schema.org Entity-Relationship Diagram](./docs/erd.png?raw=true "Schema.org Entity-Relationship Diagram")

## Development

Put this package directory beside your project directory.

In ```conmposer.json``` of the target project add
```
    "require": {
        "noud/laravel-seo-schema-org": "*"
    },
    "repositories": [
        {
            "type": "path",
            "url": "../laravel-seo-schema-org"
        }
    ]
```
In ```.env``` of the target project i set the database to an alternative database
```
DB_DATABASE=schema-org
#DB_DATABASE=seo
```

## Development migration

I migrate just this schema like so in the target project:
```
php artisan migrate --realpath --path=/var/www/laravel-seo-schema-org/src/database/migrations
```

## Development models generation

In the target project set the path and namespace in ```config/models.php```
```
        'path' => app_path('Models-schema-org'),
        'namespace' => 'SEO\SchemaOrg\Models',
```
I generate the models from this schema like so in the target project:
```
php artisan code:models --schema=schema-org
```

Then copy everything from ```app/Models-schema-org``` to the package.