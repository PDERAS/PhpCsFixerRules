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

Step 2. Install the dependency by adding the following to the `"require"` section of composer.json
```json
"pderas/php-cs-fixer-rules": "dev-master",
```

Step 3. From inside homestead
```sh
composer install
```

Step 4. When prompted for a token, create a new Personal access token so that composer can pull from private repos on github
[New personal access token](https://github.com/settings/tokens/new?scopes=repo&description=Composer+on+homestead)


Step 5. Create a file in the root of the project with the following contents:
```php
<?php

return Pderas\PhpCsFixerRules\PhpCsFixerRules::config(__DIR__);
```

Step 6. Add the following scripts to your package.json for easy use
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
