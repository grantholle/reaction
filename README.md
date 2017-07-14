# Reaction

> Generates a reaction based on a type of event (positive, bad, unsafe)

## Installation

Include this package via Composer...

```console
composer require grantholle/reaction
```

Add the service provider in `config/app.php`...

```php
'providers' => [
  ...
  Some\Kind\Of\ReactionServiceProvider::class
  ...
];
```

## Usage

Simply use the `react()` helper function to generate a random reaction. I like to pair it with Laracast's [Flash](https://github.com/laracasts/flash) package for easy, fun flash messaging.

```php
react('positive'); // <strong>Boom!</strong>
react('bad'); // <strong>Yikes!</strong>
react('unsafe'); // <strong>Heads up!</strong>

// Using chaining
react()->positive(); // <strong>Great!</strong>
react()->bad(); // <strong>Darn!</strong>
react()->unsafe(); // <strong>Easy!</strong>

// Don't wrap it in <strong/>
react('positive', false);
react(null, false)->positive();
```

💯

```php
// A controller function, for example
public function update(Request $request, Model $model)
{
  $model->update($request->all());
  $message = react()->positive() . ' The model has been updated successfully.';
  // <strong>Super!</strong> The model has been updated successfully.

  flash($message)->success();

...
```
