# Installation

Step 1: add the github repo to composer.json
```json
    "repositories": [
        {
            "type": "vcs",
            "url": "git@github.com:PDERAS/PhpCsFixerRules.git"
        }
    ],
```

Step 2. From inside homestead
```sh
composer require pderas/php-cs-fixer-rules
```

Step 3. When prompted for a token, create a new Personal access token so that composer can pull from private repos on github
[New personal access token](https://github.com/settings/tokens/new?scopes=repo&description=Composer+on+homestead)


Step 4. Create a file in the root of the project with the following contents:
```php
// .php-cs

<?php

require __DIR__ . '/vendor/pderas/php-cs-fixer-rules/src/PhpCsFixerRules.php';
return Pderas\PhpCsFixerRules\PhpCsFixerRules::config(__DIR__);
```

Step 5. Add the following scripts to your package.json for easy use
```json
"lint:php": "./vendor/bin/php-cs-fixer fix --dry-run --diff --config .php-cs",
"lint:fix:php": "./vendor/bin/php-cs-fixer fix --config .php-cs"
```

```sh
# Display problems
npm run lint:php

# Fix problems
npm run lint:fix:php
```
